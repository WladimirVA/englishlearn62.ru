<?php

use app\models\Student;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\Breadcrumbs;

$this->title = 'Студенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row mt-4">
        <div class="col">
            <?= Breadcrumbs::widget([
                'links' => [
                    [
                        'label' => 'Мой кабинет',
                        'url' => '/admin/home'
                    ],
                    [
                        'label' => 'Студенты',
                    ],
                ]
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-9 mx-auto">
            <div class="student-index">

                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('Добавить студента', ['create'], ['class' => 'btn btn-success']) ?>
                </p>


                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'username',
                        'email:email',
                        'last_name',
                        'first_name',
                        'middle_name',
                        //'enrollment_date',
                        //'created_at',
                        //'updated_at',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Student $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            }
                        ],
                    ],
                ]); ?>


            </div>
        </div>
    </div>
</div>