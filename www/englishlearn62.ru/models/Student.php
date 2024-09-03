<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Student".
 *
 * @property int $id
 * @property string $username
 * @property string $password_hash
 * @property string $email
 * @property string $last_name
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $enrollment_date
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Progress[] $progresses
 * @property Submission[] $submissions
 */
class Student extends \yii\db\ActiveRecord
{
    public $password;

    public static function tableName()
    {
        return 'Student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'email', 'last_name', 'first_name', 'enrollment_date'], 'required'],
            [['enrollment_date', 'created_at', 'updated_at', 'password'], 'safe'],
            [['username', 'last_name', 'first_name', 'middle_name'], 'string', 'max' => 50],
            [['password_hash'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 100],
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
            'email' => 'Email',
            'last_name' => 'Фамилия',
            'first_name' => 'Имя',
            'middle_name' => 'Отчество',
            'enrollment_date' => 'Дата зачисления',
            'created_at' => 'Дата добавления в систему',
            'updated_at' => 'Дата изменения данных',
            'password' => 'Пароль'
        ];
    }

    /**
     * Gets query for [[Progresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgresses()
    {
        return $this->hasMany(Progress::class, ['student_id' => 'id']);
    }

    /**
     * Gets query for [[Submissions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubmissions()
    {
        return $this->hasMany(Submission::class, ['student_id' => 'id']);
    }

    public function gfn()
    {
        return $this -> last_name . ' ' . $this -> first_name . ' ' . $this -> middle_name;
    }
}
