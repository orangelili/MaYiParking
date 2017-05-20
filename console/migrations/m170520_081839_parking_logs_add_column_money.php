<?php

use yii\db\Migration;

class m170520_081839_parking_logs_add_column_money extends Migration
{
    public function up()
    {
        $this->addColumn('{{%parking_logs}}', 'money', $this->decimal(18,5));
    }

    public function down()
    {
        $this->dropColumn('{{%parking_logs}}', 'money');
    }
}
