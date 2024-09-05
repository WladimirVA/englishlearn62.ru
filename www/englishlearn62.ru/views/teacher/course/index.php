<?php

use app\models\Course;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\Breadcrumbs;


$this->title = 'Мои курсы';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container mt-3">
    <div class="row mt-4">
        <div class="col">
            <?= Breadcrumbs::widget([
                'links' => [
                    [
                        'label' => 'Мой кабинет',
                        'url' => '/teacher/home'
                    ],
                    [
                        'label' => 'Курсы',
                    ],
                ]
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-7 mx-auto">
            <div class="course-index">

                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('Добавить курс', ['create'], ['class' => 'btn btn-success']) ?>
                </p>


                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [   'attribute' => 'title',
                            'contentOptions' => ['style' => 'width: 150px;'],
                        ],
                        'description:ntext',
                        //'level',
                        //'created_at',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Course $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            },
                            'contentOptions' => ['style' => 'width: 100px;'],
                        ],
                    ],
                ]); ?>


            </div>
        </div>
    </div>
</div>