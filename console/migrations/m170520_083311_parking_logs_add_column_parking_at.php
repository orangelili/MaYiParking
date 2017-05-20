<?php

use yii\db\Migration;

class m170520_083311_parking_logs_add_column_parking_at extends Migration
{
    public function up()
    {
        $this->addColumn('{{%parking_logs}}', 'parking_at', $this->decimal(18,5));
    }

    public function down()
    {
        $this->dropColumn('{{%parking_logs}}', 'parking_at');
    }
}
