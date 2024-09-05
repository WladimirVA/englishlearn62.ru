<?php
use app\widgets\charts\Pie;
use yii\bootstrap5\Breadcrumbs;
$this->title = 'Статистика'
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
                        'label' => 'Статистика',
                    ],
                ]
            ]) ?>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-lg-8 mx-auto">
            <p class="text-center fs-4 font-monospace text-primary">
                <?= $this->title ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div id="chart" class="col-12 col-lg-9 mx-auto">
            <?=Pie::widget(compact('c', 'e','l'))?>
        </div>
    </div>
</div>