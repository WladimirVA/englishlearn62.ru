<?php

$this->title = 'Студент - '. $student -> gfn();
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
            <div class="row  align-items-center justify-content-center row-cols-1 row-cols-lg-3 g-3">
                <div class="col">
                    <a class="text-decoration-none" href="/student/lesson">
                        <div class="card bg-primary rounded shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title text-white">Мои уроки</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a class="text-decoration-none" href="/student/progress">
                        <div class="card bg-primary rounded shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title text-white">Мой прогресс</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>