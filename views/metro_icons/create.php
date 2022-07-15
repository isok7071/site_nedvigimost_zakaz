<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MetroIcons */

$this->title = 'Create Metro Icons';
$this->params['breadcrumbs'][] = ['label' => 'Metro Icons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metro-icons-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
