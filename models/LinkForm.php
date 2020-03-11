<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\httpclient\Client;

/**
 * LinkForm is the model behind the link form.
 *
 * @property Link $link
 */
class LinkForm extends Model
{
    public string $url = '';
    public string $password = '';

    private Link $_link;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['url',], 'required'],
            [['url'], 'unique', 'skipOnError' => true, 'targetClass' => Link::class, 'targetAttribute' => ['url' => 'url']],

            [['password'], 'string'],
        ];
    }

    /**
     * Process target url
     * save the corresponded models
     */
    public function save(): bool
    {
        if ($this->validate()) {

            $client = new Client();
            try {
                $response = $client->createRequest()
                    ->setMethod('GET')
                    ->setUrl($this->url)
                    ->send();
                if ($response->isOk) {
                    if (preg_match("/<title>(.*)<\/title>/siU", $response->content, $titleMatches) !== false) { // note: in this case !== false is excess
                        $title = trim(preg_replace('/\s+/', ' ', $titleMatches[1]));
                    }
                    // see https://www.php.net/manual/ru/function.get-meta-tags.php
                    // see https://www.php.net/manual/ru/function.parse-url.php
                    $meta = get_meta_tags($this->url); // send another request. Not work with MacOS files. Not ideal. We can use another regexp for parse $data
                    $parsedUrl = parse_url($this->url);
                    $link = new Link([
                        'attributes' => [
                            'url' => $this->url,
                            'title' => $title ?? '',
                            'metaDescription' => $meta['description'],
                            'metaKeywords' => $meta['keywords'],
                        ],
                    ]);
                    // simple get favicon.ico from host. Do not check any modern icons
                    $faviconResponse = $client->get(($parsedUrl['scheme'] ? $parsedUrl['scheme'] . ':' : '') . '//' . $parsedUrl['host'] . '/favicon.ico')->send();
                    if ($faviconResponse->isOk) {
                        $link->favicon = $faviconResponse->content;
                    }

                    if (!$this->password) {
                        if ($link->save()) {
                            $this->_link = $link;

                            return true;
                        }
                        $this->addErrors($link->getErrors());

                    } else {
                        $transaction = Yii::$app->db->beginTransaction();
                        if ($link->save()) {
                            $this->_link = $link;
                            $hash = new Token([
                                'attributes' => [
                                    'linkId' => $link->id,
                                    'hash' => $this->password,
                                ],
                            ]);
                            if ($hash->save()) {
                                $transaction->commit();

                                return true;
                            }
                            $this->addErrors($hash->getErrors());
                            $transaction->rollback();

                            return false;
                        }

                        $this->addErrors($link->getErrors());
                        $transaction->rollback();

                        return false;
                    }

                } else {
                    $this->addError('url', 'Can\'t reach URL: ' . $this->url);

                    return false;
                }
            } catch (yii\httpclient\Exception $exception) {
                $this->addError('url', 'Can\'t reach URL: ' . $this->url . 'Reason: ' . $exception->getMessage());

                return false;
            }
        }

        return false;
    }

    /**
     * @return Link
     */
    public function getLink(): Link
    {
        return $this->_link;
    }
}
