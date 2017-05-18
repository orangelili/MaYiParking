<?php

namespace common\models;

use common\models\query\ParkingLogsQuery;
use Yii;

/**
 * This is the model class for table "{{%parking_logs}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $car_id
 * @property string $location_id
 * @property string $location
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class ParkingLogs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%parking_logs}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'car_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['location_id', 'location'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'car_id' => 'Car ID',
            'location_id' => 'Location ID',
            'location' => 'Location',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return ParkingLogsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ParkingLogsQuery(get_called_class());
    }
}
