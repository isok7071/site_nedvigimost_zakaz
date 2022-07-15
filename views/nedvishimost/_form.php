<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Nedvishimost */
/* @var $form yii\widgets\ActiveForm */
$type_nedvig = \app\models\TypeNedvigimost::find()->all();
$type_nedvig = \yii\helpers\ArrayHelper::map($type_nedvig, 'id', 'name');
$type_cdachi = \yii\helpers\Html::encode($_GET['type_cdachi']);
$types = ['Посуточно', 'Длительно'];
if (!in_array($type_cdachi, $types)){
    Yii::$app->session->setFlash('danger','Вы выбрали неправильный тип сдачи');
    return false;
}else{
    $type_cdachi_correct = $type_cdachi;
}

$comforts = \yii\helpers\ArrayHelper::map(\app\models\Comforts::find()->all(), 'id','name');
$metro = \yii\helpers\ArrayHelper::map(\app\models\Metro::find()->all(), 'id','name');
?>

<div class="nedvishimost-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'space')->textInput() ?>

    <?= $form->field($model, 'id_type')->radioList($type_nedvig) ?>

    <?= $form->field($model, 'kolichestvo_komnat')->textInput(['type'=>'number','max'=>20,'min'=>1]) ?>

    <?= $form->field($model, 'nomer_etash')->textInput(['type'=>'number','max'=>150,'min'=>0]) ?>

    <?= $form->field($model, 'vsego_etash')->textInput(['type'=>'number','max'=>150,'min'=>1]) ?>

    <?= $form->field($model, 'id_metro')->dropDownList($metro) ?>

    <?= $form->field($model, 'id_comforts')->checkboxList($comforts) ?>

    <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true])->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '+7 (999) 999 99 99',
    ]); ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'type_sdachi')->hiddenInput(['value'=>$type_cdachi_correct])->label('') ?>

    <div class="form-group">
        <?= Html::submitButton('СДАТЬ НЕДВИЖИМОСТЬ', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
