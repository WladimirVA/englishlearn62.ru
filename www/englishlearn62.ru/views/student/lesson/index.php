<?php

use app\models\Exercise;
use app\models\Lesson;
use yii\helpers\Url;
use yii\bootstrap5\Breadcrumbs;
$this->title = 'Мои уроки';
?>
<div class="container">
    <div class="row mt-4">
        <div class="col">
            <?=Breadcrumbs::widget([
                'links' => [
                    [
                      'label' => 'Мой кабинет',
                      'url' => '/student/home',
                    ],
                    ['label' => $this -> title],
                ]
            ])?>
        </div>
    </div>
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
                                   <li><?php if(!isset($i)) $i = 1;?>
                                        Задание № <?=$i?>
                                        <?=$e -> is_correct_sub($student -> id)?'&#9989':''?>
                                        <?=(bool)($cmt = $e -> hasComment($student -> id))?"<button type=\"button\" class=\"btn btn-sm btn-danger rounded\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\"data-bs-custom-class=\"custom-tooltip\"data-bs-title=\"$cmt\">Получен ответ</button>":""?>

                                   </li>
                                   <?php $i++; ?>
                                <?php endforeach ?>
                                <?php unset($i);?>
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
<?=$this -> registerJs(
    "
       const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle=\"tooltip\"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    "
)?>