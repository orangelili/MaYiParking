<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%valuation}}".
 *
 * @property integer $per_hour
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Valuation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%valuation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['per_hour', 'status', 'created_at', 'updated_at'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'per_hour' => 'Per Hour',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
