<?php
    $session = Yii::$app->session;

    //echo $session->get('UserBranch').' '.$session->get('BrnName');

    // Pos
    // $CshDatabaseServerAlone = $session->get('CshDatabaseServerAlone');
    // array_push($CshDatabaseServerAlone,"ADSL","CCTV","BackOffice");
    // sort($CshDatabaseServerAlone, SORT_STRING);
    // foreach($CshDatabaseServerAlone as $element) {
    //     echo str_pad($element, 9).'<br>';
    // }

?>
<div class="containerHeader">
    <span class="BranchLeft">
        <?= $session->get('UserBranch').' '.$session->get('BrnName'); ?> 
    </span>
    <span class="logOutInputSize">
        <?= 'รหัส '.$session->get('UserID').' คุณ'.$session->get('UserName'); ?>
        &nbsp;&nbsp;
        <input type="button" value="ออกจากระบบ" 
            onclick="window.location.href='/login/logout'" />
    </span>
</div>
