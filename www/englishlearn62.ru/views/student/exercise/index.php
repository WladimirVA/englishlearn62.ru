<?php

use app\models\Exercise;
use app\models\Lesson;
use app\models\Submission;
use yii\bootstrap5\Breadcrumbs;
use yii\widgets\Pjax;


$this->title = $ex[0]->lesson->title;
?>
<div class="container">
    <div class="row mt-4">
        <div class="col">
            <?= Breadcrumbs::widget([
                'links' => [
                    [
                        'label' => 'Мой кабинет',
                        'url' => '/student/home',
                    ],
                    [
                        'label' => 'Мои уроки',
                        'url' => '/student/lesson',
                    ],
                    [
                        'label' => $this->title,
                        'url' => '/student/lesson/view?id=' . $ex[0]->lesson->id,
                    ],
                    ['label' => 'Задания по уроку ' . $this->title],
                ]
            ]) ?>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-lg-8 mx-auto">
            <p class="text-center fs-4 font-monospace text-danger">
                <?= $this->title ?>
            </p>
        </div>
    </div>
    <?php foreach ($ex as $e): ?>
        <?php if ($e->NotSub($student->id)): ?>
            <?php Pjax::begin(); ?>
                <div class="row mt-4 mb-2">
                    <div class="col-12 col-lg-9 mx-auto">
                        <form action="" data-pjax="true" method="post" class="shadow p-4 rounded pjax">
                            <label for="" class="form-label"><?= $e->question ?></label>
                            <input type="text" class="form-control" name="answer" required>
                            <button class="btn mt-2 border border-danger" type="submit">Ответить</button>
                            <input type="hidden" class="form-control" name="ex_id" value="<?= $e->id ?>">
                        </form>
                    </div>
                </div>
            <?php Pjax::end(); ?>
        <?php endif ?>
    <?php endforeach ?>
</div>
</div>

<?php
$this->registerJs('
    $(".pjax").on("pjax:complete", function() { alert(\'Pjax is completed\');
});');
?>