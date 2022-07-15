<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'АДМИН-ПАНЕЛЬ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comforts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row justify-content-between mx-auto text-center">



        <div class="col-lg-3 m-4">
            <?= Html::a('Управление объявлениями', ['/nedvishimost/'], ['class' => 'btn btn-primary']) ?>
        </div>

        <div class="col-lg-3 m-4 ">
            <?= Html::a('Управление удобствами', ['/comforts/'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="col-lg-3 m-4">
            <?= Html::a('Управление пользователями', ['/user/'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="col-lg-3 m-4">
            <?= Html::a('Управление типами недвижимости', ['/type_nedvigimost/'], ['class' => 'btn btn-primary']) ?>
        </div>



    </div>



</div>
