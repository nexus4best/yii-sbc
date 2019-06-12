<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_zone".
 *
 * @property string $BrnCode
 * @property int $CtsId
 * @property int $AreaId
 * @property int $SetupId
 */

class tbl_zone extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'tbl_zone';
    }

    public function rules()
    {
        return [
            [['BrnCode'], 'required'],
            [['CtsId', 'AreaId', 'SetupId'], 'integer'],
            [['BrnCode'], 'string', 'max' => 10],
            [['BrnCode'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'BrnCode' => 'Brn Code',
            'CtsId' => 'Cts ID',
            'AreaId' => 'Area ID',
            'SetupId' => 'Setup ID',
        ];
    }
}
