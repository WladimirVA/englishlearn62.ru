<?php
$this->title = 'Авторизация администратора';
?>

<main class="pt-4">
    <div class="container">
        <?= $this->render('/html/h1', ['h1' => $this->title]) ?>
        <div class="row mt-3 mb-5">
            <div class="col-12 col-md-9 col-lg-6 mx-auto">
                <?= $this->render(
                    '/html/forms/login_form_login',
                    [
                        'btn_color' => Yii::$app->params['btn-form-color-admin'],
                        'bg' => Yii::$app->params['bg-form-color-admin']
                    ]
                )
                ?>
            </div>
        </div>
    </div>
</main>