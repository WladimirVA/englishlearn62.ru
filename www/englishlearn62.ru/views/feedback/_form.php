<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Feedback $model */
/** @var ActiveForm $form */
?>
<div class="feedback-_form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'question')->textarea() ?>
        <?= $form->field($model, 'email')->input('email') ?>
        <?= $form->field($model, 'phone')?>
        <div class="form-group mt-3 mb-4">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- feedback-_form -->
