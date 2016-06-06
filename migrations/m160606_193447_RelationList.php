<?php

use yii\db\Migration;

class m160606_193447_RelationList extends Migration
{
    public function up()
    {
        $this->renameTable('List', 'RelationList');
    }

    public function down()
    {
        $this->renameTable('RelationList', 'List');
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
