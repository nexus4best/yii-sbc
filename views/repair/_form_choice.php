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
                <option value="ricoh">01 Laser Ricoh</option>
                <option value="computer">02 คอมพิวเตอร์</option>
                <option value="harddisk">03 คอมพิวเตอร์ - ฮาร์ดดิสก์</option>
                <option value="bios">04 คอมพิวเตอร์ - แบตเตอรี่ เมนบอร์ด</option>
                <option value="ups">05 เครื่องสำรองไฟ</option>
                <option value="tm">06 เครื่องพิมพ์ใบเสร็จ</option>
                <option value="magnetic">07 เครื่องรูดบัตร</option>
                <option value="scanner">08 สแกนเนอร์</option>
                <option value="cashdrawer">09 ลิ้นชักเงินสด</option>
                <option value="cashbank">10 ที่หนีบธนบัตร</option>
                <option value="monitor">11 จอภาพ</option>
                <option value="keyboard">12 คีย์บอร์ด</option>
                <option value="mouse">13 เมาส์</option>
                <option value="powerstrip">14 รางปลั๊กไฟ</option>
                <option value="router">15 Router</option>
                <option value="voice">16 Voice</option>
                <option value="switch">17 Switch</option>
                <option value="other">18 รายการอื่นๆ</option>
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
