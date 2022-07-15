<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Nedvishimost */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nedvishimosts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nedvishimost-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'space',
            'id_type',
            'kolichestvo_komnat',
            'nomer_etash',
            'vsego_etash',
            'id_metro',
            'photo1',
            'photo2',
            'photo3',
            'price',
            'tel',
            'status_proverki',
            'created_at',
            'address:ntext',
            'id_user',
            'type_sdachi',
        ],
    ]) ?>

</div>
