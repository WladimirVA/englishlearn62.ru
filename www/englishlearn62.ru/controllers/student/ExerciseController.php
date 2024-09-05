<?php

namespace app\controllers\student;

use app\models\Model;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Auth;
use app\models\Course;
use app\models\Exercise;
use app\models\Grades;
use app\models\Lesson;
use app\models\Schedules;
use app\models\Submission;
use yii\web\Response;
use Yii;

class ExerciseController extends Controller
{
    public function actionIndex($lesson_id)
    {
        $session = Yii::$app->session;
        $student = $session->get('student');

        $ex = Exercise::find()->where(['lesson_id' => $lesson_id])->all();

        if ($this->request->isPost) {
            extract($_POST);

            if (Submission::NotExist($ex_id, $student->id)) {
                $sub = new Submission();
                $sub->exercise_id = $ex_id;
                $sub->submitted_answer = $answer;
                $sub->student_id = $student->id;
                $sub->is_correct = 0;
                if ($sub->save()) {
                    Yii::$app->session->setFlash('success', 'Ответ отправлен на проверку');
                }
            }
        }

        if(Yii::$app -> request -> isPjax){
            return $this -> renderPartial('_alert');
        }

        return $this->render('index', compact('student', 'ex'));
    }
}
