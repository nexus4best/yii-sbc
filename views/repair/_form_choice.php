<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'เลือกรายการแจ้งซ่อม';
?>

<div class="container">
    <div class="tbl-repair-form-choice">

        <?php $form = ActiveForm::begin(); ?>

            <b>โปรดเลือกรายการแจ้งซ่อม</b><br><br>
            <select name="brn_repair" class="classCTS" style="width:200px; height:27px">
                <option value="">&nbsp;</option>
                <option value="computer">01 คอมพิวเตอร์</option>
                <option value="ups">02 เครื่องสำรองไฟ</option>
                <option value="tm">03 เครื่องพิมพ์ใบเสร็จ</option>
                <option value="scanner">04 สแกนเนอร์</option>
            </select> 
            <br><br>
            <span class="repairError">
                <?= Yii::$app->session->getFlash('repairError'); ?>
            </span>
            <br><br>
            <input type="submit" class="classCTS" value="ถัดไป" style="width:190px">

        <?php ActiveForm::end(); ?>

    </div>
</div>
