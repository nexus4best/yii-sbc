<?php

$this->title = 'หน้าหลัก-ใบแจ้งซ่อม';
?>
<div class="container">
    <div class="tbl-repair-index">

        <input type="button" value="ใบแจ้งซ่อม CTS" onclick="window.location.href='choice'" 
            class="classCTS" />
        &nbsp;
        <input type="button" value="แจ้งซ่อมทรัพย์สิน" onclick="window.location.href=''" 
            class="classCTS" />

        &nbsp;&nbsp;&nbsp;&nbsp;
        
        <span style="color:green">
            <?= Yii::$app->session->getFlash('saveRepairOk'); ?>
        </span>
        <table>
            <tr>
                <td class="classTr">เลขที่</td>
                <td class="classTr">สถานะ</td>
                <td class="classTr">รายการ</td>
                <td class="classTr">เครื่อง</td>
                <td class="classTr">วันที่สร้าง</td>
                <td class="classTr">ผู้จัดทำ</td>                
            </tr>
        <?php

            foreach ($model as $key => $value) {
                echo '<tr><td><a href="view?id='.$value->id.'">'.$value->id.'</a></td>';
                if($value->BrnStatus == 'แจ้งซ่อม'){
                    echo '<td><span style="color:red">'.$value->BrnStatus.'</span>'.'</td>';
                }
                echo '<td>'.$value->BrnRepair.'</td>';
                echo '<td>'.$value->BrnPos.'</td>';
                echo '<td>'.substr($value->CreatedAt,8,2).'/'.substr($value->CreatedAt,5,2).'/'.substr($value->CreatedAt,2,2).'</td>';
                echo '<td>'.$value->BrnUserCreate.'</td></tr>';
            }

        ?>
        </table> 
    </div>
</div>

