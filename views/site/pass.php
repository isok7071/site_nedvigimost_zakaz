<?php

/** @var yii\web\View $this */

/** @var yii\bootstrap4\ActiveForm $form */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$this->title = 'СДАТЬ НЕДВИЖИМОСТЬ';
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <p class="font-weight-light text-center" style="font-size:31px;">На какой срок сдаем квартиру?</p>



    <div class="row mx-auto justify-content-center">
        <p class="col">
            <?= Html::a('Сдать длительно', ['/nedvishimost/create', 'type_cdachi'=>'Длительно'], ['class' => 'btn btn-outline-secondary pass-btns']) ?>
        </p>
        <p class="col">
            <?= Html::a('Сдать посуточно', ['/nedvishimost/create', 'type_cdachi'=>'Посуточно'], ['class' => 'btn btn-outline-secondary pass-btns']) ?>
        </p>
    </div>
</div>
