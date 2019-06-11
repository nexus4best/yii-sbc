<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\Session;

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
            [
                ['BrnBrand','BrnModel','BrnSerial','BrnPos','BrnCause'], 
                    'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'computer'
            ],
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
                    ->all();
        return $model;
    }

}