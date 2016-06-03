<?php

use yii\db\Migration;

class m160603_105840_AddDescriptionInBooks extends Migration
{
    public function up()
    {
        $this->addColumn('Books', 'Description', $this->text());
    }

    public function down()
    {
        $this->dropColumn('Books', 'Description');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
