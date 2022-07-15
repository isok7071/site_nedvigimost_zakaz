<?php

use yii\bootstrap4\Html;
$type = '';
if ($model->type_sdachi=='Посуточно'){
    $type = 'сутки';
    }else{
     $type = 'месяц';
    }
if ($model->status_proverki=='В процессе'){
    $status = 'process.png';
}else{
    if ($model->status_proverki=='Проверено модерацией'){
        $status = 'ok.png';
    }else{
        $status = 'canceled.png';
    }
}
?>

       <?= Html::img('/uploads/'.$model->photo1,['class'=>'img-fluid  img-rent']) ?>
       <div class='p-5'>
       <h2><?= $model->space ?> м², <?= $model->type->name ?></h2>
            <p><?= $model->nomer_etash ?>/<?= $model->vsego_etash ?> этаж</p>
            <p><?= substr($model->address, 0, 30)?>...</p>
            <p><?= Html::img('/uploads/'.'m'.$model->metro->id_icon.'.'.'png',['class'=>'img-fluid metro']) ?> <?= $model->metro->name ?> </p>
            <p class='btn btn-secondary provereno'><?= $model->status_proverki ?> <?= Html::img('/uploads/'.$status,['class'=>'img-fluid w-10']) ?></p>
       </div>

       <div class='float-right text-right'>
            <h3 ><?= $model->price ?> ₽ / <?= $type ?> </h3>
            <a class='btn btn-primary' href='/nedvishimost_view/view?id=<?= $model->id ?>'>Подробнее</a>
       </div>