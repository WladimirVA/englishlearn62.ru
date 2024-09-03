<?php

use app\models\Exercise;
use app\models\Lesson;

$this->title = 'Студент - ' . $student->gfn() . '(мои уроки)';
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-12 col-lg-8 mx-auto">
            <p class="text-center fs-4 font-monospace text-danger">
                <?= $this->title ?>
            </p>
            <p class="text-center fs-4 font-monospace text-danger">
                Урок <?= $lesson->title ?> <a class="btn" href="/student/lesson">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.854 1.146a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L4 2.707V12.5A2.5 2.5 0 0 0 6.5 15h8a.5.5 0 0 0 0-1h-8A1.5 1.5 0 0 1 5 12.5V2.707l3.146 3.147a.5.5 0 1 0 .708-.708z" />
                    </svg>
                </a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-9 mx-auto">
            <p class="fs-5">
                <?= $lesson->content ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-3 mx-auto">
            <a href="/student/exercise?lesson_id=<?=$lesson -> id?>" class="w-100 btn btn-success btn-lg mb-3">Выполнить задания</a>
        </div>
    </div>
</div>
</div>