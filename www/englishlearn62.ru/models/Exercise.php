<?php

namespace app\models;

use Yii;


class Exercise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Exercise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_id', 'question', 'type', 'correct_answer'], 'required'],
            [['lesson_id'], 'integer'],
            [['question', 'type', 'correct_answer'], 'string'],
            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lesson::class, 'targetAttribute' => ['lesson_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lesson_id' => 'Lesson ID',
            'question' => 'Вопрос',
            'type' => 'Type',
            'correct_answer' => 'Правильный ответ',
        ];
    }

    /**
     * Gets query for [[Lesson]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lesson::class, ['id' => 'lesson_id']);
    }

    /**
     * Gets query for [[Submissions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubmissions()
    {
        return $this->hasMany(Submission::class, ['exercise_id' => 'id']);
    }


    public function is_correct_sub($student_id)
    {
        $sub = Submission::find()->where(['exercise_id' => $this -> id, 'student_id' => $student_id])
        ->orderBy('id DESC')
        ->one();
        if(empty($sub)) return false;
        return $sub -> is_correct === 1;
    }

    public function NotSub($student_id)
    {
        $sub = Submission::find()->where(['exercise_id' => $this -> id, 'student_id' => $student_id])
        ->andWhere(['is_correct' => 1])
        ->all();

        $sub1 = Submission::find()->where(['exercise_id' => $this -> id, 'student_id' => $student_id])
        ->andWhere(['is_closed' => 0])
        ->all();

        $empty = Submission::find()->where(['exercise_id' => $this -> id, 'student_id' => $student_id])->all();



        if(empty($empty) || (empty($sub) && empty($sub1))) return true;
    }


    public function HasComment()
    {
        $ex = $this -> submissions;

        if(empty($ex)) return null;
        $last = end($ex);
        if($last -> is_correct === 1) return null;
        if($last -> is_correct === 0 && $last -> is_closed == 1 ){
           return  $last -> comment;
        }
        foreach($ex as $e){
            if($e -> is_closed){
                return $e -> comment;
            }
        }
        return null;
    }
}
