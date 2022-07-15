<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NedvishomostComforts */

$this->title = 'Update Nedvishomost Comforts: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nedvishomost Comforts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nedvishomost-comforts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
