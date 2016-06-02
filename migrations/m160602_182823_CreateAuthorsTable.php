<?php

use yii\db\Migration;

class m160602_182823_CreateAuthorsTable extends Migration
{
    public function up()
    {
        $this->createTable('Authors', [
            'Id' => $this->primaryKey(),
            'FirstName' => $this->string()->notNull(),
            'Name' => $this->string()->notNull(),
        ]);

    }

    public function down()
    {
        $this->dropTable('Authors');
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
