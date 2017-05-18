<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),

            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'mobile_phone_number' => $this->char(11)->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%cars}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),

            'brand' => $this->string(),
            'model' => $this->string()->notNull(),
            'license' => $this->string()->notNull(),

            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%parking_logs}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'car_id' => $this->integer(),

            'location_id' => $this->string(),
            'location' => $this->string(),

            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%valuation}}', [
            'per_hour' => $this->integer()->defaultValue(15),

            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%cars}}');
        $this->dropTable('{{%parking_logs}}');
        $this->dropTable('{{%valuation}}');
    }
}
