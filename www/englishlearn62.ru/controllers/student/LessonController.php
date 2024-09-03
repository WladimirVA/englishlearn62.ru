<?php

namespace app\controllers\student;

use app\models\Model;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Auth;
use app\models\Course;
use app\models\Grades;
use app\models\Lesson;
use app\models\Schedules;
use yii\web\Response;
use Yii;

class LessonController extends Controller
{
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $student = $session->get('student');

        $courses = Course::find()->all();

        return $this->render('index', compact('student', 'courses'));
    }


    public function actionView($id)
    {
        $session = Yii::$app->session;
        $student = $session->get('student');

        $lesson = Lesson::findOne($id);

        return $this->render('view', compact('student', 'lesson'));
    }

}





