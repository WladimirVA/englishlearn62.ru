<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Course;
//$teacher_id = $teacher = Yii::$app->session->get('teacher') -> id;

?>

<div class="exercise-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lesson_id', ['options' => ['class' => 'd-none']])->input('hidden', ['value' => $lesson_id]) ?>

    <?= $form->field($model, 'question')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'type', ['options' => ['class' => 'd-none']])->dropDownList([ 'multiple_choice' => 'Multiple choice', 'fill_in_the_blank' => 'Fill in the blank', 'essay' => 'Essay'], ['prompt' => '', 'options' => ['fill_in_the_blank' => ['selected' => true]]]) ?>

    <?= $form->field($model, 'correct_answer')->textarea(['rows' => 6]) ?>

    <div class="form-group mt-3 mb-3">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success w-100']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
