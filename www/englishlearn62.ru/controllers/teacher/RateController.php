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
use app\models\Submission;
use yii\web\Response;
use Yii;


class RateController extends Controller
{
    public function actionIndex()
    {
        if(!Auth::isTeacher()){
            return $this->redirect('/teacher/auth/login');
        }

        $session = Yii::$app->session;
        $teacher = $session->get('teacher');

        $sub = Submission::find()->where(['is_correct' => 0])->orderBy('id DESC')->all();


        if ($this->request->isPost) {
            extract($_POST);
            if(isset($correct)){
                $sub = Submission::findOne($sub_id);
                $sub -> is_correct = 1;
                $sub -> save();
                return $this -> refresh();
            }
        }

        return $this->render('index', compact('teacher', 'sub'));
    }






}





