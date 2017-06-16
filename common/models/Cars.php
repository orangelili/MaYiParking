<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%cars}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $brand
 * @property string $model
 * @property string $license
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Cars extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cars}}';
    }

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
    public function rules()
    {
        return [
            [['user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['model', 'license'], 'required'],
            [['brand', 'model', 'license'], 'string', 'max' => 255],
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
            'brand' => 'Brand',
            'model' => 'Model',
            'license' => 'License',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getOwner()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id'])->one();
    }

    public function getParkingLogs()
    {
        return $this->hasMany(ParkingLogs::className(), ['car_id' => 'id'])->all();
    }

    public function getCarInfo()
    {
        return $this->brand . ' ' . $this->model . ' ' . $this->license;
    }

    public function setUser(User $user)
    {
        $this->user_id = $user->id;
    }
}
