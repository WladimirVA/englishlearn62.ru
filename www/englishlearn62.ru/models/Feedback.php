<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Feedback".
 *
 * @property int $id
 * @property int|null $administrator_id
 * @property string $question
 * @property string $email
 * @property string $phone
 *
 * @property Feedback $administrator
 * @property Feedback[] $feedbacks
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['administrator_id'], 'integer'],
            [['question', 'email', 'phone'], 'required'],
            [['question'], 'string'],
            [['email'], 'string', 'max' => 150],
            [['phone'], 'string', 'max' => 20],
            [['administrator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Feedback::class, 'targetAttribute' => ['administrator_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'administrator_id' => 'Administrator ID',
            'question' => 'Вопрос/Предложение',
            'email' => 'Email',
            'phone' => 'Телефон',
        ];
    }

    /**
     * Gets query for [[Administrator]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdministrator()
    {
        return $this->hasOne(Feedback::class, ['id' => 'administrator_id']);
    }

    /**
     * Gets query for [[Feedbacks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::class, ['administrator_id' => 'id']);
    }
}
