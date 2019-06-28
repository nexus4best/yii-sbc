<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>

<div class="tbl-repair-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= Html::activeHiddenInput($model, 'BrnStatus', array("value"=> "เรียบร้อย")); ?>
    <table cellspacing="5" cellpadding="5">    
        <tr>
            <td>ข้อเสนอแนะเพิ่มเติม <span style="color:red">*</span></td>
            <td>
                <?= $form->field($model_comment, 'Message')
                    ->textArea()
                    ->label(false) 
                ?>
            </td>
        </tr>
        <tr>
            <td><a href="/repair/index"><< Back</a></td>
            <td>
                <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', 
                    ['class' => $model->isNewRecord ? '' : '']) 
                ?>
            </td>
        </tr>                 
    </table>

    <?php ActiveForm::end(); ?>

</div>
