<?php

use yii\helpers\Html;
use yii\bootstrap5\Breadcrumbs;


$this->title = 'Добавить курс';
;
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
                        'url' => '/teacher/course'
                    ],
                    [
                        'label' => $this -> title
                    ]
                ]
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-7 mx-auto">
            <div class="course-create">

                <h1><?= Html::encode($this->title) ?></h1>

                <?= $this->render('_form', [
                    'model' => $model,
                    'files' => $files,
                ]) ?>

            </div>
        </div>
    </div>
</div>