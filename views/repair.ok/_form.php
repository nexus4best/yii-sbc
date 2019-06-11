<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tbl_repair */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-repair-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'BrnStatus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BrnCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BrnRepair')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BrnPos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BrnBrand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BrnModel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BrnSerial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BrnCause')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BrnUserCreate')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
