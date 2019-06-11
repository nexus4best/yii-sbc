<?php
    $this->title = 'แสดงรายการ-ใบแจ้งซ่อม';
?>
<div class="container">
    <div class="tbl-repair-view">
        <?= $model->id; ?>
        <?= $model->BrnStatus; ?>
        <?= $model->BrnRepair; ?>
        <?= $model->BrnPos; ?>
        <?= $model->BrnBrand; ?>
        <?= $model->BrnCause; ?>
    </div>
</div>

