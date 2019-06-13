<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\Session;
use app\models\tbl_zone;

/* branch create repair
 * @property int $id
 * @property string $BrnStatus
 * @property string $BrnCode
 * @property string $BrnRepair
 * @property string $BrnPos
 * @property string $BrnBrand
 * @property string $BrnModel
 * @property string $BrnSerial
 * @property string $BrnCause
 * @property string $BrnUserCreate
 * @property string $created_at
 * @property string $updated_at
 */

class tbl_repair extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'CreatedAt',
                'updatedAtAttribute' => 'UpdatedAt',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public static function tableName()
    {
        return 'tbl_repair';
    }

    public function rules()
    {
        return [
            //computer
            [['BrnBrand','BrnPos','BrnCause','BrnSerial'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'computer'],
            [['BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'harddisk'],
            [['BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'bios'],
            [['BrnBrand','BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'ups'],
            [['BrnPos','BrnCause','BrnSerial'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'tm'],
            [['BrnBrand','BrnPos','BrnCause','BrnSerial'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'magnetic'],
            [['BrnBrand','BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'scanner'],
            [['BrnBrand','BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'cashdrawer'],
            [['BrnPos'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'cashbank'],
            [['BrnBrand','BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'monitor'],
            [['BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'keyboard'],
            [['BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'mouse'],
            [['BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'powerstrip'],
            [['BrnBrand','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'router'],
            [['BrnBrand','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'voice'],
            [['BrnBrand','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'switch'],
            [['BrnRepair','BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'other'],
            //[['BrnStatus', 'BrnCode', 'BrnRepair', 'BrnPos', 'BrnBrand', 'BrnModel', 'BrnSerial', 'BrnCause', 'BrnUserCreate'], 'required'],
            [['CreatedAt', 'UpdatedAt'], 'safe'],
            [['BrnStatus', 'BrnCode', 'BrnPos'], 'string', 'max' => 100],
            [['BrnRepair', 'BrnBrand', 'BrnModel', 'BrnSerial', 'BrnCause', 'BrnUserCreate'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'เลขที่',
            'BrnCode' => 'รหัสสาขา',
            'BrnStatus' => 'สถานะ',
            'BrnRepair' => 'รายการ',
            'BrnPos' => 'เครื่อง',
            'BrnBrand' => 'ยี่ห้อ',
            'BrnModel' => 'รุ่น',
            'BrnSerial' => 'หมายเลข',
            'BrnCause' => 'สาเหตุ',
            'BrnUserCreate' => 'ผู้จัดทำ',
            'CreatedAt ' => 'วันที่สร้าง',
            'UpdatedAt ' => 'UpdatedAt',
        ];
    }

    public static function getAll()
    {
        $model = tbl_repair::find()
                    ->where(['BrnCode' => Yii::$app->session->get('UserBranch')])
                    ->orderBy(['id' => SORT_DESC])
                    ->all();
        return $model;
    }

    public function sendMail($pos,$repair)
    {
        $area = tbl_zone::find()->where(['BrnCode' => Yii::$app->session->get('UserBranch')])->one();
        $mail_area = 'area'.$area->AreaId.'_sbc@se-ed.com';

        if($pos == 'CCTV' || $pos == 'ADSL'){
            $mail_to = 'helpdesk@se-ed.com';
        }else{
            $mail_to = 'cts_sbc@se-ed.com';
        }

        $mail_subject = Yii::$app->session->get('UserBranch').' '.$pos.' '.$repair;

        Yii::$app->mailer->compose('@app/mail/layouts/repair_create',[
            'fullname' => 'แจ้งซ่อม ONLINE'
        ])
        ->setFrom([
            'repairing@se-ed.com' => 'แจ้งซ่อม ONLINE'
        ])
        ->setTo(array($mail_to,$mail_area))
        ->setSubject($mail_subject)
        ->send();
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if($insert){

            $session = Yii::$app->session;
            $session->set('id', $this->id);
            $session->set('BrnRepair', $this->BrnRepair);
            $session->set('BrnBrand', $this->BrnBrand);
            $session->set('BrnModel', $this->BrnModel);            
            $session->set('BrnSerial', $this->BrnSerial);
            $session->set('BrnCause', $this->BrnCause);            
            $session->set('BrnPos', $this->BrnPos);
            $session->set('BrnUserCreate', $this->BrnUserCreate);            

            \Yii::$app->getSession()->setFlash('saveRepairOk', 'บันทึกแจ้งซ่อม '.$this->BrnRepair.' เรียบร้อย');
            
            $pos = $this->BrnPos;
            $repair = $this->BrnRepair;
            
            //$this->sendMail($pos,$repair);
        }
        /*
        else {
            //update
            if(this->status_id != $changedAttributes['status_id']){
                // field status change
            }
        }
        */
    }

}
