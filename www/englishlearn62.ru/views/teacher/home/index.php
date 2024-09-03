<?php
use edofre\fullcalendar\Fullcalendar;
use yii\web\JsExpression;
$this->title = 'Преподаватель - '. $teacher -> gfn();
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-12 col-lg-8 mx-auto">
            <p class="text-center fs-4 font-monospace text-danger">
                <?= $this->title ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-9 mx-auto">
            <div class="row  align-items-center justify-content-center row-cols-1 row-cols-lg-2 g-3">
                <div class="col">
                    <a class="text-decoration-none" href="/teacher/course">
                        <div class="card bg-primary rounded shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title text-white">Курсы</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a class="text-decoration-none" href="/teacher/lesson">
                        <div class="card bg-primary rounded shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title text-white">Уроки</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a class="text-decoration-none" href="/teacher/exercise">
                        <div class="card bg-primary rounded shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title text-white">Задания</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a class="text-decoration-none" href="/teacher/rate">
                        <div class="card bg-primary rounded shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title text-white">Оценки</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>