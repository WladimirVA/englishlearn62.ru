<?php

use yii\helpers\Html;
use yii\bootstrap5\Breadcrumbs;

$this->title = 'Обратная связь';

?>
<div class="container">
    <?= $this->render('/html/h1', ['h1' => $this->title]) ?>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-7 mx-auto">
            <div class="student-create">
                <?php if (!Yii::$app -> session -> hasFlash('success')) : ?>
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-12 col-lg-7 mx-auto">

        </div>
    </div>
</div>