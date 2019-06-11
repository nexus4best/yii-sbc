<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'หน้าหลัก-ใบแจ้งซ่อม';
?>
<div class="container">
    <div class="tbl-repair-index">

        <input type="button" value="ใบแจ้งซ่อม CTS" onclick="window.location.href='repair/choice'" 
            class="classCTS" />
        &nbsp;
        <input type="button" value="แจ้งซ่อมทรัพย์สิน" onclick="window.location.href=''" 
            class="classCTS" />

        &nbsp;&nbsp;&nbsp;&nbsp;<span><?= Yii::$app->session->getFlash('saveRepairOk'); ?></span>


    </div>
</div>

