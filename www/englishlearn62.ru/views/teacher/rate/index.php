<?php

use app\models\Exercise;
use app\models\Lesson;

$this->title = $teacher -> gfn() . '(оценка заданий)';
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
            <table class="table text-center">
                <tr>
                    <td>Задание</td>
                    <td>Ответ студента</td>
                    <td>Верный ответ</td>
                    <td>Верно</td>
                    <td>Оценить</td>
                </tr>
                <?php foreach($sub as $s):?>
                    <tr>
                        <td>
                        <a href="/teacher/exercise/view?id=<?=$s -> exercise -> id?>">Задание № <?=$s -> exercise -> id?></a>
                        </td>
                        <td><?=$s -> submitted_answer?></td>
                        <td><?=$s -> exercise -> correct_answer?></td>
                        <td>
                            <form action="" method="post">
                            <input class="form-check-input" type="checkbox" name="correct" value="1">
                        </td>
                        <td>
                            <button type="submit" class="btn bnt-light btn-sm border">Отправить</button>
                            <input type="hidden" name="sub_id" value="<?=$s -> id?>">
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
    </div>
</div>