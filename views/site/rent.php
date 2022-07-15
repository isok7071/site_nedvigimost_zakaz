<?php

/** @var yii\web\View $this */

/** @var yii\bootstrap4\ActiveForm $form */
/* @var $searchModel app\models\Nedvishimost_rentSearch */

/* @var $dataProvider app\models\Nedvishimost_rentSearch */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;
use yii\widgets\LinkPager;
use yii\widgets\ListView;

$this->title = 'АРЕНДОВАТЬ НЕДВИЖИМОСТЬ';
$types = \yii\helpers\ArrayHelper::map(\app\models\TypeNedvigimost::find()->all(), 'id', 'name');
$metro = \yii\helpers\ArrayHelper::map(\app\models\Metro::find()->all(), 'id', 'name');
$types = \yii\helpers\ArrayHelper::map(\app\models\TypeNedvigimost::find()->all(), 'id', 'name');
$types_cd = ['Посуточно' => 'Посуточно', 'Длительно' => 'Длительно'];

?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row d-flex flex-row align-items-center  justify-content-center">
        <?php $form = ActiveForm::begin([
            'action' => ['/site/rent'],
            'method' => 'get',
            'options' => [
                'class' => 'd-flex p-2  '
            ],

        ]); ?>

        <div class="col-sm-3">
            <?= $form->field($searchModel, 'id_type')->dropdownList($types, ['prompt' => 'Выберите значение'])->label('Тип недвижимости') ?>
            <?php echo $form->field($searchModel, 'id_metro')->dropdownList($metro, ['prompt' => 'Выберите значение'])->label('Станция метро (Если есть)') ?>
        </div>

        <div class="col-sm-2">
            <?= $form->field($searchModel, 'kolichestvo_komnat')->textInput(['type' => 'number', 'min'=>0,'max' => 20])->label('Комнат') ?>
        </div>
        <div class="flex-row">
            <?= $form->field($searchModel, 'space') ?>
            <?= $form->field($searchModel, 'space2') ?>
        </div>
        <div class="flex-row">
        <?php echo $form->field($searchModel, 'price') ?>
        <?php echo $form->field($searchModel, 'price2') ?>
        </div>


            <?php echo $form->field($searchModel, 'type_sdachi')->dropdownList($types_cd, ['prompt' => 'Выберите значение']) ?>






    </div>
    <div class="form-group float-right">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Сбросить', ['/site/rent'], ['class' => 'btn btn-outline-secondary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <div class="row mx-auto justify-content-center">

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'options' => [
                'tag' => 'div',
                'class' => 'row',
            ],
            'layout' => '{items}',
            'itemOptions' => ['class' => 'item-rent mx-auto mb-5 rounded item d-flex flex-row align-items-center',
                'tag' => 'div'],
            'itemView' => '_list',
        ]) ?>

    </div>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,

        'layout' => '{pager}',

    ]) ?>
</div>
