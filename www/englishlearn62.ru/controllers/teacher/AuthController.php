<?php

namespace app\controllers\teacher;

use app\models\Model;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Auth;


class AuthController extends Controller
{
    public function actionLogin()
    {
        if ($this->request->isPost) {
            //du($_POST);
            extract($_POST);
            if(Auth::checkTeacher($login, $password)){
                return $this->redirect('/teacher/home');
            }
        }
        return $this->render('login');
    }



    public function actionLogout()
    {
        Auth::logout();
        return $this->goHome();

    }
}





