<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%token}}".
 *
 * @property int $linkId
 * @property string|null $hash
 *
 * @property Link $link
 */
class Token extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%token}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['linkId'], 'required'],
            [['linkId'], 'integer'],
            [['hash'], 'string', 'max' => 60],
            [['linkId'], 'unique'],
            [['linkId'], 'exist', 'skipOnError' => true, 'targetClass' => Link::class, 'targetAttribute' => ['linkId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'linkId' => 'Link ID',
            'hash' => 'Hash',
        ];
    }

    /**
     * Gets query for [[Link]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLink()
    {
        return $this->hasOne(Link::class, ['id' => 'linkId'])->inverseOf('token');
    }

    /**
     * Redefine for use setters
     * @param string $name
     * @param mixed $value
     * @throws \yii\base\Exception
     */
    public function __set($name, $value)
    {
        if ($name == 'hash') {
            parent::__set($name, Yii::$app->getSecurity()->generatePasswordHash($value));

            return;
        }
        parent::__set($name, $value);
    }

    /**
     * Return result of password validation
     * @param $password
     * @return bool
     */
    public function isValidPassword($password)
    {
        try {
            return Yii::$app->getSecurity()->validatePassword($password, $this->hash);
        } catch (yii\base\InvalidArgumentException $exception) {
            if ($exception->getMessage() == 'Hash is invalid.') {
                return false;
            }
            throw $exception;
        }
    }
}
