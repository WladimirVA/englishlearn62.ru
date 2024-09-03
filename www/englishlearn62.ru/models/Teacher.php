<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Teacher".
 *
 * @property int $id
 * @property string $username
 * @property string $password_hash
 * @property string $email
 * @property string $last_name
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $subject_specialization
 * @property string $hired_date
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Course[] $courses
 */
class Teacher extends \yii\db\ActiveRecord
{
    public $password;

    public static function tableName()
    {
        return 'Teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'email', 'last_name', 'first_name', 'subject_specialization', 'hired_date'], 'required'],
            [['hired_date', 'created_at', 'updated_at','password'], 'safe'],
            [['username', 'last_name', 'first_name', 'middle_name'], 'string', 'max' => 50],
            [['password_hash'], 'string', 'max' => 255],
            [['email', 'subject_specialization'], 'string', 'max' => 100],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password_hash' => 'Пароль',
            'password' => 'Пароль',
            'email' => 'Email',
            'last_name' => 'Фамилия',
            'first_name' => 'Имя',
            'middle_name' => 'Отчество',
            'subject_specialization' => 'Специализация',
            'hired_date' => 'Дата приёма на работу',
            'created_at' => 'Дата создания аккаунта',
            'updated_at' => 'Дата изменения аккаунта',
        ];
    }

    /**
     * Gets query for [[Courses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::class, ['teacher_id' => 'id']);
    }

    public function gfn()
    {
        return $this->last_name . ' ' . $this->first_name . ' ' . $this->middle_name;
    }
}
