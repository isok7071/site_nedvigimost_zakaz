<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NedvishimostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nedvishimost-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'space') ?>

    <?= $form->field($model, 'id_type') ?>

    <?= $form->field($model, 'kolichestvo_komnat') ?>

    <?= $form->field($model, 'nomer_etash') ?>

    <?php // echo $form->field($model, 'vsego_etash') ?>

    <?php // echo $form->field($model, 'id_metro') ?>

    <?php // echo $form->field($model, 'photo1') ?>

    <?php // echo $form->field($model, 'photo2') ?>

    <?php // echo $form->field($model, 'photo3') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'status_proverki') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <?php // echo $form->field($model, 'type_sdachi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
