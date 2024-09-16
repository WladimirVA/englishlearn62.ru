<?php
use yii\bootstrap5\Breadcrumbs;
$this->title = 'Меню управления администратора'
?>
<div class="container">
    <div class="row mt-4">
        <div class="col">
            <?= Breadcrumbs::widget([
                'links' => [
                    [
                        'label' => 'Мой кабинет',
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
        <div class="col-12 col-lg-9 mx-auto pb-4">
            <div class="row flex-column align-items-center justify-content-center row-cols-1 row-cols-lg-3 g-3">
                <div class="col">
                    <a class="text-decoration-none" href="/admin/student/index">
                        <div class="card bg-primary rounded shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title text-white">Студенты</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a class="text-decoration-none" href="/admin/teacher/index">
                        <div class="card bg-primary rounded shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title text-white">Преподаватели</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a class="text-decoration-none" href="/admin/home/statistic">
                        <div class="card bg-primary rounded shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title text-white">Статистика</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a class="text-decoration-none" href="/admin/home/feedback">
                        <div class="card bg-primary rounded shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title text-white">Обратная связь</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>