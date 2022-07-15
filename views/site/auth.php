<?php

use yii\helpers\Html;


$this->title = 'Кабинет'
?>
<div class="user-update">

    <h1 class="pt-5">АВТОРИЗАЦИЯ</h1>

    <div class="text-center ">
        <p>
            <?= Html::a('ВОЙТИ', ['/site/login'], ['class' => 'btn btn-primary col-md-3 font-weight-bold']) ?>
        </p>
        <p>
            <?= Html::a('РЕГИСТРАЦИЯ', ['/site/reg'], ['class' => 'btn btn-success col-md-3 font-weight-bold']) ?>
        </p>

    </div>
</div>
