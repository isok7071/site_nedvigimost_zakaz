<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MetroIcons */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="metro-icons-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_vetki')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
