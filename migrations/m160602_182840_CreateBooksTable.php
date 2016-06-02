<?php

use yii\db\Migration;

class m160602_182840_CreateBooksTable extends Migration
{
    public function up()
    {
        $this->createTable('Books', [
            'Id' => $this->primaryKey(),
            'Title' => $this->string()->notNull(),
        ]);

    }

    public function down()
    {
        $this->dropTable('Books');
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
