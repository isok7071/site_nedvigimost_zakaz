<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NedvishomostComforts */

$this->title = 'Create Nedvishomost Comforts';
$this->params['breadcrumbs'][] = ['label' => 'Nedvishomost Comforts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nedvishomost-comforts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
