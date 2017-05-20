<?php

use yii\db\Migration;

class m170520_084541_add_admin_user extends Migration
{
    public function up()
    {

        $this->insert('{{%user}}', [
            'username' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'mobile_phone_number' => '12345678901',
            'status' => 11,
        ]);
    }

    public function down()
    {
        return true;
    }
}
