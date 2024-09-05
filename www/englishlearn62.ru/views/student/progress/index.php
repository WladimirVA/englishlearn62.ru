<?php

use app\models\Exercise;
use app\models\Lesson;
use yii\bootstrap5\Breadcrumbs;

$this->title = 'Мой прогресс';
?>
<div class="container">
    <div class="row mt-4">
        <div class="col">
            <?=Breadcrumbs::widget([
                'links' => [
                    [
                      'label' => 'Мой кабинет',
                      'url' => '/student/home',
                    ],
                    ['label' => $this -> title],
                ]
            ])?>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-lg-8 mx-auto">
            <p class="text-center fs-4 font-monospace text-danger">
                <?= $this->title ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-7 mx-auto">
            <?php foreach ($lessons as $ls): ?>
                <?php $pr = $ls->get_progress($student->id)?>
                <span class="mt-3">Урок № <?=$ls -> id?></span>
                <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-success" style="width: <?=$pr?>%"><?=$pr?>%</div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
</div>