<?php

use app\models\Lesson;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Уроки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12 col-lg-8 mx-auto">
            <div class="lesson-index">

                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('Добавить урок', ['create'], ['class' => 'btn btn-success']) ?>
                </p>


                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'course',
                            'value' => 'course.title',
                            'label' => 'Курс',
                            'headerOptions' => ['style' => 'color: rgb(187, 212, 206);']
                        ],
                        'title',
                        'order',
                        [
                            'attribute' => 'id',
                            'label' => '',
                            'format' => 'raw',
                            'value' => function($model) {
                                return Html::a('Добавить задание', '/teacher/exercise/create?lesson_id=' . $model -> id);
                            },
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Lesson $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            },
                            'headerOptions' => ['style' => 'width:100px;']
                        ],
                    ],
                ]); ?>


            </div>
        </div>
    </div>
</div>