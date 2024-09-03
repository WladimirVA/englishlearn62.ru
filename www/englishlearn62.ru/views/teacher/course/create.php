<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Course $model */

$this->title = 'Добавить курс';
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12 col-lg-7 mx-auto">
            <div class="course-create">

                <h1><?= Html::encode($this->title) ?></h1>

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</div>