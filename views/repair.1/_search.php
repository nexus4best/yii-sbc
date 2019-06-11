<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblRepairSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-repair-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'BrnCode') ?>

    <?= $form->field($model, 'BrnStatus') ?>

    <?= $form->field($model, 'BrnRepair') ?>

    <?= $form->field($model, 'BrnPos') ?>

    <?php // echo $form->field($model, 'BrnBrand') ?>

    <?php // echo $form->field($model, 'BrnModel') ?>

    <?php // echo $form->field($model, 'BrnSerial') ?>

    <?php // echo $form->field($model, 'BrnUserCreate') ?>

    <?php // echo $form->field($model, 'CreatedAt') ?>

    <?php // echo $form->field($model, 'UpdatedAt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
