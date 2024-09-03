<?php

namespace app\controllers\user;

use app\models\Announcements;
use app\models\Auth;
use app\models\Customer;
use app\models\Feedback;
use app\models\Order;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Users;



class HomeController extends Controller
{


    public function actionIndex()
    {
        if(!Auth::isUser()){
            return $this->redirect('/user/login');
        }

        $user = Yii::$app -> session -> get('user');
        $user_id = $user -> id;

        return $this->render('index', compact('user'));
    }
}
