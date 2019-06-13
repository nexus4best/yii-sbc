<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$session = Yii::$app->session;
$CshDatabaseServerAlone = $session->get('CshDatabaseServerAlone');
//$CshDatabaseServerAlone += ["BackOffice" => "BackOffice" ];
$CshDatabaseServerAlone += [ "ADSL" => "ADSL", "CCTV" => "CCTV", "BackOffice" => "BackOffice" ];

$this->title = 'แจ้งซ่อม-Router';

?>
<div class="container">
    <div class="tbl-repair-router">

        <?php $form = ActiveForm::begin(); ?>

            <table cellspacing="5" cellpadding="5">
                <tr>
                    <td>แจ้งซ่อม</td>
                    <td>
                        <?= $form->field($model, 'BrnRepair')
                            ->textInput(['value' => $title, 'readonly' => 'readonly', 'style' => 'background:#FFFF88'])
                            ->label(false) 
                        ?>
                    </td>
                </tr>  
                <tr>
                    <td>ยี่ห้อ <span style="color:red">*</span></td>
                    <td>
                        <?= $form->field($model, 'BrnBrand')
                            ->textInput()
                            ->label(false) 
                        ?>
                    </td>
                </tr>   
                <tr>
                    <td>รุ่น</td>
                    <td>
                        <?= $form->field($model, 'BrnModel')
                            ->textInput()
                            ->label(false) 
                        ?>
                    </td>
                </tr> 
                <tr>
                    <td>หมายเลข</span></td>
                    <td>
                        <?= $form->field($model, 'BrnSerial')
                            ->textInput()
                            ->label(false) 
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>สาเหตุ <span style="color:red">*</span></td>
                    <td>
                        <?= $form->field($model, 'BrnCause')
                            ->textArea()
                            ->label(false) 
                        ?>
                    </td>
                </tr>    
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', 
                            ['class' => $model->isNewRecord ? '' : '']) 
                        ?>
                    </td>
                </tr>                 
            </table>

        <?php ActiveForm::end(); ?>

    </div>
</div>
