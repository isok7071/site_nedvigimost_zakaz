<?php

/** @var yii\web\View $this */

/** @var yii\bootstrap4\ActiveForm $form */

/* @var $model app\models\NedvishimostSearch */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Carousel;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;
use yii\widgets\LinkPager;
use yii\widgets\ListView;

$this->title = 'АРЕНДОВАТЬ НЕДВИЖИМОСТЬ';

$type = '';
if ($model->type_sdachi == 'Посуточно') {
    $type = 'сутки';
} else {
    $type = 'месяц';
}

?>


<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    $photos = [];

    if ($model->photo1) {
        $photo = $model->photo1;
    } else {
        $photo = 'no_photo.png';
    }
    if ($model->photo2) {
        $photo2 = $model->photo2;
    } else {
        $photo2 = 'no_photo.png';
    }
    if ($model->photo3) {
        $photo3 = $model->photo3;
    } else {
        $photo3 = 'no_photo.png';
    }
    $i = 0;
    $carousel = [];
    $carousel[] = [
        'content' => '<img src="/uploads/' . $photo . '" alt="Фото" class="img-fluid w-100 "/>',
    ];
    $carousel[] = [
        'content' => '<img src="/uploads/' . $photo2 . '" alt="Фото" class="img-fluid w-100 "/>',
    ];
    $carousel[] = [
        'content' => '<img src="/uploads/' . $photo3 . '" alt="Фото" class="img-fluid w-100 "/>',
    ];

    ?>
    <div class="align-items-center justify-content-between d-flex flex-row">

        <?= Carousel::widget([
            'items' => $carousel,
        ]);
        ?>
        <div class="d-flex flex-column float-right text-right ">
            <h2 class="float-right  font-weight-light "><?= $model->space ?> м², <?= $model->type->name ?></h2>
            <h3 ><b><?= $model->price ?> ₽ / <?= $type ?> </b></h3>
            <a class='btn text-center btn-primary' href='tel:<?= $model->tel ?>'>Позвонить</a>

            <?php
            if (!Yii::$app->user->isGuest && Yii::$app->user->identity->admin==1) {
                if ($model->status_proverki=='В процессе'){
                    echo Html::a('Сменить статус на проверено',['/nedvishimost_admin/complete', 'id'=>$model->id], ['class' => 'mt-2 btn btn-success']);
                    echo Html::a('Сменить статус на отклонено',['/nedvishimost_admin/cancel', 'id'=>$model->id], ['class' => 'mt-2 btn btn-warning']);
                }else{
                    echo Html::a('Удалить объявление',['/nedvishimost_admin/delete', 'id'=>$model->id], ['class' => 'mt-2 btn btn-outline-danger']);
                }
            }

            ?>

        </div>
    </div>

    <div class="mt-5 row justify-content-between">
        <div class="col text-center">
            <h2>ЭТАЖ</h2>
            <p class="font-weight-light"><?= $model->nomer_etash ?>/<?= $model->vsego_etash ?> этаж</p>
        </div>
        <div class="col text-center">
            <h2>ПЛОЩАДЬ м²</h2>
            <p class="font-weight-light"><?= $model->nomer_etash ?>/<?= $model->vsego_etash ?> этаж</p>
        </div>
        <div class="col text-center">
            <h2>АДРЕС</h2>
            <p class="font-weight-light"><?= substr($model->address, 0, 100) ?></p>
        </div>
        <div class="col text-center">
            <h2>МЕТРО</h2>
            <p class="font-weight-light"><?= Html::img('/uploads/' . 'm' . $model->metro->id_icon . '.' . 'png', ['class' => 'metro img-fluid']) ?> <?= $model->metro->name ?> </p>
        </div>
    </div>
    <h2 class="mt-5 text-center mb-3" >УДОБСТВА</h2>

    <div class="row justify-content-between">

            <?php
                foreach ($model->nedvishomostComforts as $item){
                    echo '<div class="col text-center">
                     <img src="/uploads/'.$item->comforts->icon.'" alt="Удобство" )>
                     <p class="font-weight-light">'.$item->comforts->name.'</p>
                </div>';
                }
            ?>
    </div>

</div>
