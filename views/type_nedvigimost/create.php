<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeNedvigimost */

$this->title = 'Create Type Nedvigimost';
$this->params['breadcrumbs'][] = ['label' => 'Type Nedvigimosts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-nedvigimost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
