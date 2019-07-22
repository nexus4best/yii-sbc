<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tbl_repair */

$this->title = 'Update Tbl Repair: ' . $model->id;
?>
<div class="container">
    <div class="tbl-repair-update">

    <?php

        if($model->BrnRepair=='Laser RICOH'){
            echo 'เลขที่ '.$model->id.' แจ้งซ่อม '.$model->BrnRepair.
            ' วันที่ '.substr($model->CreatedAt,8,2).'/'.substr($model->CreatedAt,5,2).'/'.substr($model->CreatedAt,2,2);
        }else{
            echo 'เลขที่ '.$model->id.' แจ้งซ่อม '.$model->BrnRepair.
            ' ส่งของ '.substr($model->send->CreatedAt,8,2).'/'.substr($model->send->CreatedAt,5,2).'/'.substr($model->send->CreatedAt,2,2);
        }

    ?>

        <?= $this->render('_form', [
            'model' => $model,
            'model_comment' => $model_comment,
        ]) ?>

    </div>
</div>

