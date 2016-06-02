<?php

use yii\db\Migration;

class m160602_182853_CreateListTable extends Migration
{
    public function up()
    {
        $this->createTable('List', [
            'IdRow' => $this->primaryKey(),
            'IdBook' => $this->integer(),
            'IdAuthor' => $this->integer(),
        ]);
        $this->addForeignKey('IdBook', 'List', 'IdBook', 'Books', 'Id', 'cascade', 'cascade');
        $this->addForeignKey('IdAuthor', 'List', 'IdAuthor', 'Authors', 'Id', 'cascade', 'cascade');

    }

    public function down()
    {
        $this->dropTable('List');
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
