<?php
$this->title = 'Авторизация клиента'
?>
<div class="container">
    <?= $this->render('/html/h1', ['h1' => $this->title]) ?>
</div>
<main class="pt-2">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 col-md-9 col-lg-5 mx-auto">
                <?=$this -> render('/html/forms/login_form_login',
                [
                    'btn_color' => Yii::$app -> params['btn-form-color'],
                    'bg' => Yii::$app -> params['bg-form-color']
                ])
                ?>
            </div>
        </div>
    </div>
</main>