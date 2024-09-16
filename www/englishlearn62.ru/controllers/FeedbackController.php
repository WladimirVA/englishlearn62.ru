<?php

namespace app\controllers;

use app\models\Announcements;
use app\models\FavoriteAnnouncements;
use yii\web\Controller;
use app\models\Feedback;
use Yii;



class FeedbackController extends Controller
{

    public function actionIndex()
    {
        $model = new Feedback();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if($model->save()){
                    Yii::$app -> session -> setFlash('success', 'Спасибо, ваше сообщение отправлено, ответ будет отправлен на указанный email');

                    return $this->refresh();
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
