<?php

use app\models\Exercise;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Задания';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12 col-lg-8 mx-auto">
            <div class="exercise-index">

                <h1><?= Html::encode($this->title) ?></h1>


                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'lesson_id',
                            'value' => 'lesson.title',
                            'label' => 'Урок'
                        ],
                        'question:ntext',
                        'type',
                        'correct_answer:ntext',
                        [
                            'class' => ActionColumn::className(),
                            'template' => '{view}{delete}',
                            'urlCreator' => function ($action, Exercise $model, $key, $index, $column) {
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