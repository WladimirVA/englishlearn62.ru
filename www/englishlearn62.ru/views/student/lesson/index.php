<?php

use app\models\Exercise;
use app\models\Lesson;

$this->title = 'Студент - '. $student -> gfn() . '(мои уроки)';
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
            <ul>
            <?php foreach($courses as $c):?>
                <li>
                    <?=$c -> title?>
                    <?php $lessons = Lesson::find()->where(['course_id' => $c -> id])->all() ?>
                    <ul>
                    <?php foreach($lessons as $l):?>
                        <li><a href="/student/lesson/view?id=<?=$l -> id?>">
                             <?=$l -> title?>
                            </a>
                            <?php $ex = Exercise::find()->where(['lesson_id' => $l -> id])->all() ?>
                            <ul>
                                <?php foreach($ex as $e):?>
                                   <li>
                                        Задание № <?=$e -> id?> <?=$e -> is_correct_sub($student -> id)?'&#9989':''?>
                                   </li>
                                <?php endforeach ?>
                            </ul>
                        </li>
                    <?php endforeach?>
                    </ul>

                </li>
            <?php endforeach?>
            </ul>
        </div>
    </div>
    </div>
</div>