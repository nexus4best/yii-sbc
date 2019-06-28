<?php
    $this->title = 'แสดงรายการ-ใบแจ้งซ่อม';
?>

    <?php
    if($model->BrnRepair == 'Laser Ricoh'){ 
        if($model->BrnStatus == 'แจ้งซ่อม'){ ?>
            <div class="container">
                    <table cellspacing="1" cellpadding="1">   
                        <tr>
                            <td width="120px">เลขที่</td>
                            <td><?= $model->id; ?></td>
                        </tr>    
                        <tr>
                            <td>สถานะ</td>
                            <td><?= $model->BrnStatus; ?></td>
                        </tr> 
                        <tr>
                            <td>แจ้งซ่อม</td>
                            <td><?= $model->BrnRepair; ?></td>
                        </tr> 
                        <tr>
                            <td>หมายเลข</td>
                            <td><?= $model->BrnSerial; ?></td>
                        </tr>
                        <tr>
                            <td>สาเหตุ</td>
                            <td><?= $model->BrnCause; ?></td>
                        </tr>
                        <tr>
                            <td>วันที่แจ้งซ่อม</td>
                            <td><?= $model->CreatedAt.' '.$model->BrnCreateByName; ?></td>
                        </tr>                    
                    </table>
            </div> 
        <?php
        }elseif($model->BrnStatus == 'SendMail'){
        ?>
            <div class="container">
                    <table cellspacing="1" cellpadding="1">   
                        <tr>
                            <td width="120px">เลขที่</td>
                            <td><?= $model->id; ?></td>
                        </tr>    
                        <tr>
                            <td>สถานะ</td>
                            <td><?= $model->BrnStatus; ?></td>
                        </tr> 
                        <tr>
                            <td>แจ้งซ่อม</td>
                            <td><?= $model->BrnRepair; ?></td>
                        </tr> 
                        <tr>
                            <td>หมายเลข</td>
                            <td><?= $model->BrnSerial; ?></td>
                        </tr>
                        <tr>
                            <td>สาเหตุ</td>
                            <td><?= $model->BrnCause; ?></td>
                        </tr>
                        <tr>
                            <td>วันที่แจ้งซ่อม</td>
                            <td><?= $model->CreatedAt.' '.$model->BrnCreateByName; ?></td>
                        </tr>  
                     
                    </table>
            </div> 
            <?php
        }elseif($model->BrnStatus == 'ส่งของ'){
        ?>
            <div class="container">
                    <table cellspacing="1" cellpadding="1">   
                        <tr>
                            <td width="120px">เลขที่</td>
                            <td><?= $model->id; ?></td>
                        </tr>    
                        <tr>
                            <td>สถานะ</td>
                            <td><?= $model->BrnStatus; ?></td>
                        </tr> 
                        <tr>
                            <td>แจ้งซ่อม</td>
                            <td><?= $model->BrnRepair; ?></td>
                        </tr> 
                        <tr>
                            <td>หมายเลข</td>
                            <td><?= $model->BrnSerial; ?></td>
                        </tr>
                        <tr>
                            <td>สาเหตุ</td>
                            <td><?= $model->BrnCause; ?></td>
                        </tr>
                        <tr>
                            <td>วันที่แจ้งซ่อม</td>
                            <td><?= $model->CreatedAt.' '.$model->BrnCreateByName; ?></td>
                        </tr>  
                        <tr>
                            <td>วันที่ SendMail</td>
                            <td><?= $model->UserAcceptAt; ?></td>
                        </tr>  
                        <tr>
                            <td>Job</td>
                            <td><?= $model->UpdatedAt.' '.$model->RicohJob.' '.$model->UserAccept; ?></td>
                        </tr>                      
                    </table>
            </div>             
        <?php
        }elseif($model->BrnStatus == 'ลบ'){
        ?>
            <div class="container">
                    <table border='1'>   
                        <tr>
                            <td width="120px">เลขที่</td>
                            <td><?= $model->id; ?></td>
                        </tr>    
                        <tr>
                            <td>สถานะ</td>
                            <td><?= $model->BrnStatus; ?></td>
                        </tr> 
                        <tr>
                            <td>แจ้งซ่อม</td>
                            <td><?= $model->BrnRepair; ?></td>
                        </tr> 
                        <tr>
                            <td>หมายเลข</td>
                            <td><?= $model->BrnSerial; ?></td>
                        </tr>
                        <tr>
                            <td>สาเหตุ</td>
                            <td><?= $model->BrnCause; ?></td>
                        </tr>
                        <tr>
                            <td>Job</td>
                            <td><?= $model->RicohJob; ?></td>
                        </tr>
                        <tr>
                            <td>วันที่แจ้งซ่อม</td>
                            <td><?= $model->CreatedAt.' '.$model->BrnCreateByName; ?></td>
                        </tr>                         
                    </table>
            </div> 
        <?php
        }elseif($model->BrnStatus == 'เรียบร้อย'){
        ?>
            <div class="container">
                    <table cellspacing="5" cellpadding="5">   
                        <tr>
                            <td width="120px">เลขที่</td>
                            <td><?= $model->id; ?></td>
                        </tr>    
                        <tr>
                            <td>สถานะ</td>
                            <td><?= $model->BrnStatus; ?></td>
                        </tr> 
                        <tr>
                            <td>แจ้งซ่อม</td>
                            <td><?= $model->BrnRepair; ?></td>
                        </tr> 
                        <tr>
                            <td>หมายเลข</td>
                            <td><?= $model->BrnSerial; ?></td>
                        </tr>
                        <tr>
                            <td>สาเหตุ</td>
                            <td><?= $model->BrnCause; ?></td>
                        </tr>
                        <tr>
                            <td>วันที่แจ้งซ่อม</td>
                            <td><?= $model->CreatedAt.' '.$model->BrnCreateByName; ?></td>
                        </tr>                      
                    </table>
            </div> 
        <?php
        }
        ?>

    <?php /* Status Repair */
    }elseif($model->BrnStatus == 'แจ้งซ่อม'){ 
    ?>
        <!-- แจ้งซ่อม -->

        <div class="container">
            <table cellspacing="1" cellpadding="1">   
                <tr>
                    <td width="120px">เลขที่</td>
                    <td><?= $model->id; ?></td>
                </tr>    
                <tr>
                    <td>สถานะ</td>
                    <td><?= $model->BrnStatus; ?></td>
                </tr> 
                <tr>
                    <td>แจ้งซ่อม</td>
                    <td><?= $model->BrnRepair; ?></td>
                </tr> 
                <tr>
                    <td>เครื่อง</td>
                    <td><?= $model->BrnPos; ?></td>
                </tr> 
                <tr>
                    <td>ยี่ห้อ</td>
                    <td><?= $model->BrnBrand; ?></td>
                </tr>
                <tr>
                    <td>รุ่น</td>
                    <td><?= $model->BrnModel; ?></td>
                </tr>
                <tr>
                    <td>หมายเลข</td>
                    <td><?= $model->BrnSerial; ?></td>
                </tr>
                <tr>
                    <td>สาเหตุ</td>
                    <td><?= $model->BrnCause; ?></td>
                </tr>
                <tr>
                    <td>วันที่แจ้งซ่อม</td>
                    <td><?= $model->CreatedAt.' '.$model->BrnCreateByName; ?></td>
                </tr>                        
            </table>
        </div> 

    <?php
    }elseif($model->BrnStatus == 'รับเรื่อง'){ 
    ?>
        <!-- รับเรื่อง -->
        <div class="container">
            <table cellspacing="1" cellpadding="1">   
                <tr>
                    <td width="120px">เลขที่</td>
                    <td><?= $model->id; ?></td>
                </tr>    
                <tr>
                    <td>สถานะ</td>
                    <td><?= $model->BrnStatus; ?></td>
                </tr> 
                <tr>
                    <td>แจ้งซ่อม</td>
                    <td><?= $model->BrnRepair; ?></td>
                </tr> 
                <tr>
                    <td>เครื่อง</td>
                    <td><?= $model->BrnPos; ?></td>
                </tr> 
                <tr>
                    <td>ยี่ห้อ</td>
                    <td><?= $model->BrnBrand; ?></td>
                </tr>
                <tr>
                    <td>รุ่น</td>
                    <td><?= $model->BrnModel; ?></td>
                </tr>
                <tr>
                    <td>หมายเลข</td>
                    <td><?= $model->BrnSerial; ?></td>
                </tr>
                <tr>
                    <td>สาเหตุ</td>
                    <td><?= $model->BrnCause; ?></td>
                </tr>
                <tr>
                    <td>วันที่แจ้งซ่อม</td>
                    <td><?= $model->CreatedAt.' '.$model->BrnCreateByName; ?></td>
                </tr>   
                <tr>
                    <td>วันที่รับเรื่อง</td>
                    <td><?= $model->AcceptAt.' '.$model->AcceptByName; ?></td>
                </tr>                       
            </table>
        </div>         

    <?php
    }elseif($model->BrnStatus == 'ส่งของ'){ 
    ?>    

        <!-- ส่งของ -->
        <div class="container">
            <table cellspacing="1" cellpadding="1">   
                <tr>
                    <td width="120px">เลขที่</td>
                    <td><?= $model->id; ?></td>
                </tr>    
                <tr>
                    <td>สถานะ</td>
                    <td><?= '<span style="color:blue">'.$model->BrnStatus.'</span>'; ?></td>
                </tr> 
                <tr>
                    <td>แจ้งซ่อม</td>
                    <td><?= $model->BrnRepair; ?></td>
                </tr> 
                <tr>
                    <td>เครื่อง</td>
                    <td><?= $model->BrnPos; ?></td>
                </tr> 
                <tr>
                    <td>ยี่ห้อ</td>
                    <td><?= $model->BrnBrand.' | <span style="color:blue">'.$model->send->SendBrand.'</span>'; ?></td>
                </tr>
                <tr>
                    <td>รุ่น</td>
                    <td><?= $model->BrnModel.' | <span style="color:blue">'.$model->send->SendModel.'</span>'; ?></td>
                </tr>
                <tr>
                    <td>หมายเลข</td>
                    <td><?= $model->BrnSerial.' | <span style="color:blue">'.$model->send->SendSerial.'</span>'; ?></td>
                </tr>
                <tr>
                    <td>สาเหตุ</td>
                    <td><?= $model->BrnCause; ?></td>
                </tr>
                <tr>
                    <td>วันที่แจ้งซ่อม</td>
                    <td><?= $model->CreatedAt.' '.$model->BrnCreateByName; ?></td>
                </tr>   
                <tr>
                    <td>วันที่รับเรื่อง</td>
                    <td><?= $model->AcceptAt.' '.$model->AcceptByName; ?></td>
                </tr>     
                <tr>
                    <td>วันที่ส่งของ</td>
                    <td><?= '<span style="color:blue">'.$model->send->CreatedAt.' '.$model->send->SendByName.'</span>'; ?></td>
                </tr>  
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>  
                <tr>
                    <td>&nbsp;</td>
                    <td><span style="color:blue"> * </span>สีน้ำเงินคืออรายละเอียดอุปกรณ์ จัดส่งให้สาขา</td>
                </tr>                  
            </table>
        </div>  

    <?php
    }elseif($model->BrnStatus == 'เรียบร้อย'){ 
    ?> 

        <!-- เรียบร้อย -->   
        <div class="container">
            <table cellspacing="1" cellpadding="1">   
                <tr>
                    <td width="120px">เลขที่</td>
                    <td><?= $model->id; ?></td>
                </tr>    
                <tr>
                    <td>สถานะ</td>
                    <td><?= '<span style="color:blue">'.$model->BrnStatus.'</span>'; ?></td>
                </tr> 
                <tr>
                    <td>แจ้งซ่อม</td>
                    <td><?= $model->BrnRepair; ?></td>
                </tr> 
                <tr>
                    <td>เครื่อง</td>
                    <td><?= $model->BrnPos; ?></td>
                </tr> 
                <tr>
                    <td>ยี่ห้อ</td>
                    <td><?= $model->BrnBrand.' | <span style="color:blue">'.$model->send->SendBrand.'</span>'; ?></td>
                </tr>
                <tr>
                    <td>รุ่น</td>
                    <td><?= $model->BrnModel.' | <span style="color:blue">'.$model->send->SendModel.'</span>'; ?></td>
                </tr>
                <tr>
                    <td>หมายเลข</td>
                    <td><?= $model->BrnSerial.' | <span style="color:blue">'.$model->send->SendSerial.'</span>'; ?></td>
                </tr>
                <tr>
                    <td>สาเหตุ</td>
                    <td><?= $model->BrnCause; ?></td>
                </tr>
                <tr>
                    <td>วันที่แจ้งซ่อม</td>
                    <td><?= $model->CreatedAt.' '.$model->BrnCreateByName; ?></td>
                </tr>   
                <tr>
                    <td>วันที่รับเรื่อง</td>
                    <td><?= $model->AcceptAt.' '.$model->AcceptByName; ?></td>
                </tr>     
                <tr>
                    <td>วันที่ส่งของ</td>
                    <td><?= '<span style="color:blue">'.$model->send->CreatedAt.' '.$model->send->SendByName.'</span>'; ?></td>
                </tr>  
                <tr>
                    <td>วันที่คลิกรับของ</td>
                    <td><?= $model->comment->CreatedAt.' '.$model->comment->MessageByName; ?></td>
                </tr>  
                <tr>
                    <td>ข้อเสนอแนะ</td>
                    <td><?= $model->comment->Message; ?></td>
                </tr>  
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>  
                <tr>
                    <td>&nbsp;</td>
                    <td><span style="color:blue"> * </span>สีน้ำเงินคืออรายละเอียดอุปกรณ์ จัดส่งให้สาขา</td>
                </tr>                  
            </table>
        </div>  
    <?php
    }elseif($model->BrnStatus == 'ลบ'){ 
    ?>    
        <!-- ลบ -->
        <div class="container">
            <table cellspacing="1" cellpadding="1">   
                <tr>
                    <td width="120px">เลขที่</td>
                    <td><?= $model->id; ?></td>
                </tr>    
                <tr>
                    <td>สถานะ</td>
                    <td><?= $model->BrnStatus; ?></td>
                </tr> 
                <tr>
                    <td>แจ้งซ่อม</td>
                    <td><?= $model->BrnRepair; ?></td>
                </tr> 
                <tr>
                    <td>เครื่อง</td>
                    <td><?= $model->BrnPos; ?></td>
                </tr> 
                <tr>
                    <td>ยี่ห้อ</td>
                    <td><?= $model->BrnBrand; ?></td>
                </tr>
                <tr>
                    <td>รุ่น</td>
                    <td><?= $model->BrnModel; ?></td>
                </tr>
                <tr>
                    <td>หมายเลข</td>
                    <td><?= $model->BrnSerial; ?></td>
                </tr>
                <tr>
                    <td>สาเหตุ</td>
                    <td><?= $model->BrnCause; ?></td>
                </tr>
                <tr>
                    <td>วันที่แจ้งซ่อม</td>
                    <td><?= $model->CreatedAt.' '.$model->BrnCreateByName; ?></td>
                </tr>
                <tr>
                    <td>วันที่ลบ</td>
                    <td><?= $model->UpdatedAt.' '.$model->DeleteByName; ?></td>
                </tr>     
                <tr>
                    <td>สาเหตุที่ลบ</td>
                    <td><?= $model->DeleteCause; ?></td>
                </tr>                     
            </table>
        </div> 
    <?php } ?>    
