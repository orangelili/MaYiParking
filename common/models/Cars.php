<?php

namespace common\models;

use Yii;

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
    public function rules()
    {
        return [
            [['user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['model', 'license', 'created_at', 'updated_at'], 'required'],
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
}
