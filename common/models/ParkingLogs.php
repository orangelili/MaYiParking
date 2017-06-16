<?php

namespace common\models;

use common\models\query\ParkingLogsQuery;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%parking_logs}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $car_id
 * @property string $location_id
 * @property string $location
 * @property float $money
 * @property integer $parking_at
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class ParkingLogs extends \yii\db\ActiveRecord
{
    const STATE_ACTIVE = 1;
    const STATE_CAR_IN = 2;
    const STATE_CAR_OUT = 3;
    const STATE_COMPLETED = 4;

    public static $parkingStateMap = [
        self::STATE_ACTIVE => '已预约',
        self::STATE_CAR_IN => '正在停车',
        self::STATE_CAR_OUT => '已取车',
        self::STATE_COMPLETED => '已结算',
    ];

    const LOCATION_ID_YANGHU = 1;
    const LOCATION_ID_TIEDAO = 2;
    const LOCATION_ID_XINGXING = 3;
    const LOCATION_ID_MAYI = 4;
    const LOCATION_ID_JIAJIA = 5;
    public static $locationMap = [
        self::LOCATION_ID_YANGHU => '羊湖停车场',
        self::LOCATION_ID_TIEDAO => '铁道学院停车场',
        self::LOCATION_ID_XINGXING => '星星停车场',
        self::LOCATION_ID_MAYI => '蚂蚁停车场',
        self::LOCATION_ID_JIAJIA => '佳佳停车场',
    ];

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

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
            [['location_id'], 'required'],
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
            'money' => 'Money',
            'parking_at' => 'Created At',
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

    public function getOwner()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id'])->one();
    }

    public function getCar()
    {
        return $this->hasOne(Cars::className(), ['id' => 'car_id'])->one();
    }

    public function initData(User $user)
    {
        $this->location = self::$locationMap[$this->location_id];
        $this->user_id = $user->id;
    }

    public function isActive()
    {
        return $this->status === self::STATE_ACTIVE;
    }

    public function canTake()
    {
        return $this->status === self::STATE_CAR_IN;
    }

    public function parking()
    {
        $this->status = self::STATE_CAR_IN;
        $this->parking_at = time();
    }

    public function take()
    {
        $this->calculate();
        $this->status = self::STATE_COMPLETED;
    }

    public function calculate()
    {
        $now = time();
        $parkingHour = (intval($now) - intval($this->parking_at)) / 3600;
        $this->money = floatval($parkingHour) * 15;
    }
}
