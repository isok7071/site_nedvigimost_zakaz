<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nedvishimost */

$this->title = 'Сдать квартиру';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nedvishimost-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>О недвижимости:</h3>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
