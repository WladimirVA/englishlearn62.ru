<?php

use app\models\Teacher;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\Breadcrumbs;

$this->title = 'Преподаватели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row mt-4">
        <div class="col">
            <?= Breadcrumbs::widget([
                'links' => [
                    [
                        'label' => 'Мой кабинет',
                        'url' => '/admin/home'
                    ],
                    [
                        'label' => 'Преподаватели',
                    ],
                ]
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-7 mx-auto">
            <div class="teacher-index">

                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('Добавить преподавателя', ['create'], ['class' => 'btn btn-success']) ?>
                </p>


                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'username',
                        'email:email',
                        'last_name',
                        'first_name',
                        'middle_name',
                        //'subject_specialization',
                        //'hired_date',
                        //'created_at',
                        //'updated_at',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Teacher $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            }
                        ],
                    ],
                ]); ?>


            </div>
        </div>
    </div>
</div>