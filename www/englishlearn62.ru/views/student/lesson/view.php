<?php

use app\models\Exercise;
use app\models\Lesson;
use yii\helpers\Url;
use yii\bootstrap5\Breadcrumbs;

$this->title = $lesson->title;
?>
<div class="container">
    <div class="row mt-4">
        <div class="col">
            <?= Breadcrumbs::widget([
                'links' => [
                    [
                        'label' => 'Мой кабинет',
                        'url' => '/student/home',
                    ],
                    [
                        'label' => 'Мои уроки',
                        'url' => '/student/lesson',
                    ],
                    ['label' => $this->title],
                ]
            ]) ?>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-lg-8 mx-auto">
            <p class="text-center fs-4 font-monospace text-danger">
                Урок #<?=$lesson -> order?> - <?= $lesson->title ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-9 mx-auto">
            <p class="fs-5">
                <?= $lesson->content ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-3 mx-auto">
            <a href="/student/exercise?lesson_id=<?= $lesson->id ?>" class="w-100 btn btn-success btn-lg mb-3">Выполнить задания</a>
        </div>
    </div>
</div>
</div>