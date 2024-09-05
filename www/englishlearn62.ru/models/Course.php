<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Course".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $level
 * @property string|null $files
 * @property int $teacher_id
 * @property string|null $created_at
 *
 * @property Lesson[] $lessons
 * @property Progress[] $progresses
 * @property Teacher $teacher
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'teacher_id'], 'required'],
            [['description', 'level', 'files'], 'string'],
            [['teacher_id'], 'integer'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::class, 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название курса',
            'description' => 'Описание',
            'level' => 'Уровень',
            'files' => 'Файлы',
            'teacher_id' => 'Преподаватель',
            'created_at' => 'Дата создания',
        ];
    }

    /**
     * Gets query for [[Lessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLessons()
    {
        return $this->hasMany(Lesson::class, ['course_id' => 'id']);
    }

    /**
     * Gets query for [[Progresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgresses()
    {
        return $this->hasMany(Progress::class, ['course_id' => 'id']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::class, ['id' => 'teacher_id']);
    }

    public function getFiles()
    {
        if(is_string($this -> files)){
            return explode(PHP_EOL, $this -> files);
        }else{
            return null;
        }
    }
}
