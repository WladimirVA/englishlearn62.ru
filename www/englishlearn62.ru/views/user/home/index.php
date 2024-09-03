<?php
$this->title = $user->getFullName();
?>
<div class="container">
    <?= $this->render('/html/h1', ['h1' => $this->title]) ?>
    <div class="row mt-3">

    </div>
</div>