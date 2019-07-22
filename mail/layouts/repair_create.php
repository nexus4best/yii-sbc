<?php if(Yii::$app->session->get('BrnRepair')=='Laser Ricoh'){ ?>

    <?= Yii::$app->session->get('UserBranch').' '.Yii::$app->session->get('BrnName'); ?>
    <br>
    เลขที่ <?= Yii::$app->session->get('id') ?> 
    แจ้งซ่อม <span style="color:red"><?= Yii::$app->session->get('BrnRepair') ?></span>
    <br>
    หมายเลข <?= Yii::$app->session->get('BrnSerial') ?>
    <br>
    สาเหตุ <span style="color:red"><?= Yii::$app->session->get('BrnCause') ?></span>
    <br>
    ผู้แจ้งซ่อม <span style="color:blue"><?= Yii::$app->session->get('BrnCreateByName') ?></span>

<?php }else{ ?>

    <?= Yii::$app->session->get('UserBranch').' '.Yii::$app->session->get('BrnName'); ?>
    <br>
    เลขที่ <?= Yii::$app->session->get('id') ?> 
    แจ้งซ่อม <span style="color:red"><?= Yii::$app->session->get('BrnRepair') ?></span>
    <br>
    ยี่ห้อ <?= Yii::$app->session->get('BrnBrand') ?>
    <br>
    รุ่น <?= Yii::$app->session->get('BrnModel') ?>
    <br>
    หมายเลข <?= Yii::$app->session->get('BrnSerial') ?>
    <br>
    เครื่อง <?= Yii::$app->session->get('BrnPos') ?>
    <br>
    สาเหตุ <span style="color:red"><?= Yii::$app->session->get('BrnCause') ?></span>
    <br>
    ผู้แจ้งซ่อม <span style="color:blue"><?= Yii::$app->session->get('BrnCreateByName') ?></span>

<?php } ?>


