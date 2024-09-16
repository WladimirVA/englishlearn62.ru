<?php

namespace app\controllers\admin;

use app\models\Model;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Auth;
use app\models\Course;
use app\models\Exercise;
use app\models\Feedback;
use app\models\Lesson;

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

        $c = Course::find()->count();
        $e = Exercise::find()->count();
        $l = Lesson::find()->count();

        return $this->render('statistic' , compact('c', 'e', 'l'));
    }

    public function actionFeedback()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Feedback::find(),
            'pagination' => [
                'pageSize' => 3
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('feedback', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect('/admin/home/feedback');
    }


    protected function findModel($id)
    {
        if (($model = Feedback::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}





