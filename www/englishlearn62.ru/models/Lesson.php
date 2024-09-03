<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Lesson".
 *
 * @property int $id
 * @property int $course_id
 * @property string $title
 * @property string $content
 * @property int $order
 *
 * @property Course $course
 * @property Exercise[] $exercises
 * @property Progress[] $progresses
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'title', 'content', 'order'], 'required'],
            [['course_id', 'order'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 100],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Курс',
            'title' => 'Название урока',
            'content' => 'Контент',
            'order' => 'Порядковый номер урока в курсе',
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::class, ['id' => 'course_id']);
    }

    /**
     * Gets query for [[Exercises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercises()
    {
        return $this->hasMany(Exercise::class, ['lesson_id' => 'id']);
    }

    /**
     * Gets query for [[Progresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgresses()
    {
        return $this->hasMany(Progress::class, ['lesson_id' => 'id']);
    }

    public function getCountEx()
    {
        return Exercise::find()->where(['lesson_id' => $this -> id])->count();
    }

    public function getExIds()
    {
        return Exercise::find()->select('id') -> where(['lesson_id' => $this -> id])->column();
    }

    public function get_progress($student_id)
    {
        $ids = $this -> getExIds();

        $completed = Submission::find()->where(['student_id' => $student_id, 'exercise_id' => $ids, 'is_correct' => 1])->all();

        $res = (int)((count($completed)/count($ids)*100));

        return $res;

    }
}
