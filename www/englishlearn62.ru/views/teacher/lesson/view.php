<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap5\Breadcrumbs;



$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Lessons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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
                        'label' => 'Уроки',
                        'url' => '/teacher/lesson'
                    ],
                    [
                        'label' => $this->title
                    ]
                ]
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-7 mx-auto">
            <div class="lesson-view">

                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'course.title',
                        'title',
                        //'content:ntext',
                        'order',
                    ],
                ]) ?>

            </div>
        </div>
    </div>
</div>