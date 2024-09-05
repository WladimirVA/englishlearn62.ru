<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap5\Breadcrumbs;


$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container mt-3">
    <div class="row mt-4">
        <div class="col">
            <?= Breadcrumbs::widget([
                'links' => [
                    [
                        'label' => 'Мой кабинет',
                        'url' => '/teacher/home'
                    ],
                    [
                        'label' => 'Курсы',
                        'url' => '/teacher/course'
                    ],
                    [
                        'label' => $this->title
                    ]
                ]
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-7 mx-auto">
            <div class="course-view">

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
                        'title',
                        'description:ntext',
                        //'level',
                        [
                            'label' => 'Файлы курса',
                            'format' => 'raw',
                            'value' => function ($model, $widget){
                                if($files = $model -> getFiles()){
                                    $html = '';
                                    $i = 1;
                                    foreach($files as $fl){
                                        $html .= "<a href=\"$fl\">Файл $i</a>";
                                        $html .= "<hr>";
                                        $i ++;
                                    }
                                    return $html;
                                }else{
                                    return 'Файлов нет';
                                }
                            },
                            'contentOptions' => ['class' => 'bg-red'],
                            'captionOptions' => ['tooltip' => 'Tooltip'],
                        ],
                        'created_at',
                    ],
                ]) ?>

            </div>
        </div>
    </div>
</div>