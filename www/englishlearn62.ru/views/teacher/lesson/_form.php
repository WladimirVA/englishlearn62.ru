<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Course;
use mihaildev\ckeditor\CKEditor;

$teacher_id = $teacher = Yii::$app->session->get('teacher') -> id;
?>

<div class="lesson-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'course_id')->dropdownList(
        Course::find()->where(['teacher_id' => $teacher_id])->select(['title', 'id'])->indexBy('id')->column(),
        ['prompt' => 'Выберите курс'] // Параметры виджета, можно добавить другие параметры
    ) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::class,[
    'editorOptions' => [
        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false,

        'disallowedContent' => 'table[border,cellpadding,cellspacing]',
        'stylesSet' => [
            [
                'name' => 'Параграф',
                'element' => 'p',
                'attributes' => ['class' => 'text-start']
            ],
            [
                'name' => 'Таблица с границей',
                'element' => 'table',
                'attributes' => [
                    'class' => 'table',
                ],
                'styles' => [
                    'width' => '100%'
                ],
            ],
        ],
    ],
]); ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <div class="form-group mt-3 mb-3">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success w-100']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
