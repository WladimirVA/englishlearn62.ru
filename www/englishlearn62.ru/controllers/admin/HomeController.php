<?php

namespace app\controllers\admin;

use app\models\Model;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Auth;


class HomeController extends Controller
{
    public function actionIndex()
    {
        if(!Auth::isAdmin()){
            return $this->redirect('/admin/login');
        }

        return $this->render('index');
    }

    public function actionUp()
    {
        if(!Auth::isAdmin()){
            return $this->redirect('/admin/login');
        }

        return $this->render('up');
    }


    public function actionStatistic()
    {
        if(!Auth::isAdmin()){
            return $this->redirect('/admin/login');
        }

        return $this->render('statistic');
    }


}





