<?php

use app\models\Exercise;
use app\models\Lesson;
use app\models\Submission;

$this->title = 'Студент - ' . $student->gfn() . '(мои задания)';
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-12 col-lg-8 mx-auto">
            <p class="text-center fs-4 font-monospace text-danger">
                <?= $this->title ?><a class="btn border border-primary ms-2" href="/student/lesson">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.854 1.146a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L4 2.707V12.5A2.5 2.5 0 0 0 6.5 15h8a.5.5 0 0 0 0-1h-8A1.5 1.5 0 0 1 5 12.5V2.707l3.146 3.147a.5.5 0 1 0 .708-.708z" />
                    </svg>
                </a>
            </p>
        </div>
    </div>
    <?php foreach ($ex as $e): ?>
        <?php if($e -> NotSub($student -> id)): ?>
            <div class="row mt-4 mb-2">
            <div class="col-12 col-lg-9 mx-auto">
                <form action="" method="post" class="shadow p-4 rounded">
                    <label for="" class="form-label"><?=$e -> question ?></label>
                    <input type="text" class="form-control" name="answer" required>
                    <button class="btn mt-2 border border-danger" type="submit">Ответить</button>
                    <input type="hidden" class="form-control" name="ex_id" value="<?=$e -> id?>">
                </form>
            </div>
        </div>
        <?php endif ?>
    <?php endforeach ?>
</div>
</div>