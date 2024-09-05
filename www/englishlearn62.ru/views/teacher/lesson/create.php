<?php

use yii\helpers\Html;
use yii\bootstrap5\Breadcrumbs;




$this->title = 'Добавить урок';

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
            <div class="lesson-create">

                <h1><?= Html::encode($this->title) ?></h1>

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</div>