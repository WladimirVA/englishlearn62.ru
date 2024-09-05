<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap5\Breadcrumbs;

$this->title = $model->gfn();
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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
                        'url' => '/admin/student'
                    ],
                    [
                        'label' => $this->title,
                    ],
                ]
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-7 mx-auto">
            <div class="student-view">

                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'username',
                        //'password_hash',
                        'email:email',
                        'last_name',
                        'first_name',
                        'middle_name',
                        'enrollment_date',
                        'created_at',
                        'updated_at',
                    ],
                ]) ?>

            </div>

        </div>
    </div>
</div>