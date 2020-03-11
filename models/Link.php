<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%link}}".
 *
 * @property int $id
 * @property string $date
 * @property resource|null $favicon
 * @property string $url
 * @property string|null $title
 * @property string|null $metaDescription
 * @property string|null $metaKeywords
 *
 * @property Token $token
 */
class Link extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%link}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['favicon', 'title', 'metaDescription', 'metaKeywords'], 'string'],
            [['url'], 'required'],
            [['url'], 'string', 'max' => 768],
            [['url'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'favicon' => 'Favicon',
            'url' => 'Url',
            'title' => 'Title',
            'metaDescription' => 'Meta Description',
            'metaKeywords' => 'Meta Keywords',
        ];
    }

    /**
     * Gets query for [[Token]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getToken()
    {
        return $this->hasOne(Token::class, ['linkId' => 'id'])->inverseOf('link');
    }

    /**
     * {@inheritdoc}
     * @return LinkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LinkQuery(static::class);
    }
}
