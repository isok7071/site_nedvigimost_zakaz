<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comforts */

$this->title = 'Создать удобство';
$this->params['breadcrumbs'][] = ['label' => 'Удобства', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comforts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
