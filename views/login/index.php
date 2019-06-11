<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;

    $this->title = 'Login-ใบแจ้งซ่อม'

?>
<div class="container">
    <div class="loginHeader">
        รหัสพนักงานและรหัสผ่านใช้ชุดเดียวกับระบบ i-Office
    </div>
    <?php ActiveForm::begin(['id' => 'login-form']); ?>

        <div class="loginInput">
            รหัสพนักงาน
            <br>
            <input type="text" name="UserID" class="loginInputSize" autocomplete="off">
            <br><br>
            รหัสผ่าน
            <br>
            <input type="password" name="UserPassword" class="loginInputSize" autocomplete="off">
            <br><br><br>
            <input type="submit" value="ลงชื่อเข้าใช้" class="loginInputSize">
            <br><br>

            <span class="loginError">
                <?= Yii::$app->session->getFlash('loginError'); ?>
            </span>

        </div>     

    <?php ActiveForm::end(); ?>

</div>
