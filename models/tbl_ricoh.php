<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_ricoh".
 *
 * @property int $id
 * @property string $SendMailIP
 * @property string $OpenJob
 * @property string $OpenJobByName
 * @property string $CreatedAt
 * @property string $UpdatedAt
 */
class tbl_ricoh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_ricoh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['CreatedAt', 'UpdatedAt'], 'safe'],
            [['SendMailIP', 'OpenJob', 'OpenJobByName'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'SendMailIP' => 'Send Mail Ip',
            'OpenJob' => 'Open Job',
            'OpenJobByName' => 'Open Job By Name',
            'CreatedAt' => 'Created At',
            'UpdatedAt' => 'Updated At',
        ];
    }
}
