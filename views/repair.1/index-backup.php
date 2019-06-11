<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'หน้าหลัก-ใบแจ้งซ่อม';
?>
<div class="container">
    <div class="tbl-repair-index">

        <input type="button" value="ใบแจ้งซ่อม CTS" onclick="window.location.href='index.php?r=repair/choice'" />

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'filterPosition' => '',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'BrnStatus',
                'BrnRepair',
                'BrnPos',
                'CreatedAt',
                'BrnUserCreate',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>

