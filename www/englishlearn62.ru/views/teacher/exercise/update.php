<?php

use yii\helpers\Html;
use yii\bootstrap5\Breadcrumbs;


$this->title = 'Изменить задание №' . $model -> id;

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
                        'label' => 'Задания',
                        'url' => '/teacher/exercise'
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
            <div class="exercise-update">

                <h1><?= Html::encode($this->title) ?></h1>

                <?= $this->render('_form', [
                    'model' => $model,
                    'lesson_id' => $lesson_id
                ]) ?>

            </div>
        </div>
    </div>
</div>