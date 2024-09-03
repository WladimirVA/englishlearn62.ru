<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Submission".
 *
 * @property int $id
 * @property int $exercise_id
 * @property int $student_id
 * @property string $submitted_answer
 * @property int $is_correct
 * @property string|null $submitted_at
 *
 * @property Exercise $exercise
 * @property Student $student
 */
class Submission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Submission';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['exercise_id', 'student_id', 'submitted_answer', 'is_correct'], 'required'],
            [['exercise_id', 'student_id', 'is_correct'], 'integer'],
            [['submitted_answer'], 'string'],
            [['submitted_at'], 'safe'],
            [['exercise_id'], 'exist', 'skipOnError' => true, 'targetClass' => Exercise::class, 'targetAttribute' => ['exercise_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::class, 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'exercise_id' => 'Exercise ID',
            'student_id' => 'Student ID',
            'submitted_answer' => 'Submitted Answer',
            'is_correct' => 'Is Correct',
            'submitted_at' => 'Submitted At',
        ];
    }

    /**
     * Gets query for [[Exercise]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercise()
    {
        return $this->hasOne(Exercise::class, ['id' => 'exercise_id']);
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::class, ['id' => 'student_id']);
    }

    public static function NotExist($ex_id, $student_id)
    {
        $exist = Submission::find()->where(['exercise_id' => $ex_id, 'student_id' => $student_id ])->asArray()->all();
        return empty($exist);
    }

}
