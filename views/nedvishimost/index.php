<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NedvishimostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nedvishimosts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nedvishimost-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Nedvishimost', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'options'=>[
            'tag'=>'div',
            'class'=>'row',
        ],
        'layout'=>'{items}',
        'itemOptions' => ['class' => 'item-rent  mx-auto mb-5 rounded item d-flex flex-row align-items-center',
            'tag'=>'div'],
        'itemView' => '/site/_listadmin',
    ])?>


</div>
