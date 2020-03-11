<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\httpclient\Client;

/**
 * LinkDeleteForm is the model for delete request.
 *
 * @property Link $link
 */
class LinkDeleteForm extends Model
{
    public string $password = '';

    private Link $_link;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['password'], 'string'],
            ['password', function ($attribute, $params) {
                if (!(($this->_link ?? false) && $this->_link->token->isValidPassword($this->$attribute))) {
                    $this->addError($attribute, 'Incorrect password');
                }
            }],
        ];
    }

    /**
     * Delete the corresponded models
     */
    public function delete(): bool
    {
        if ($this->_link ?? false) {
            return $this->_link->delete();
        }

        return false;
    }

    /**
     * @param Link $link
     */
    public function setLink(Link $link): void
    {
        $this->_link = $link;
    }

    /**
     * @return Link
     */
    public function getLink(): Link
    {
        return $this->_link;
    }

}
