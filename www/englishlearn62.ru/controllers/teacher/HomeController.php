<?php

namespace app\controllers\teacher;

use app\models\Model;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Auth;
use app\models\Grades;
use app\models\Schedules;
use app\models\Students;
use yii\web\Response;
use Yii;


class HomeController extends Controller
{
    public function actionIndex()
    {
        if(!Auth::isTeacher()){
            return $this->redirect('/teacher/auth/login');
        }

        $session = Yii::$app->session;
        $teacher = $session->get('teacher');

        return $this->render('index', compact('teacher'));
    }

}





