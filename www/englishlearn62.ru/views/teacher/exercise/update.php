<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Exercise $model */

$this->title = 'Изменить задание';
$this->params['breadcrumbs'][] = ['label' => 'Exercises', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container mt-3">
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