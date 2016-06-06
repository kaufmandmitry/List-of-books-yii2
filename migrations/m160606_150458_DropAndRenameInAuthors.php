<?php

use yii\db\Migration;

class m160606_150458_DropAndRenameInAuthors extends Migration
{
    public function up()
    {
        $this->dropColumn('Authors', 'Name');
        $this->renameColumn('Authors', 'FirstName', 'Name');
    }

    public function down()
    {
        $this->renameColumn('Authors', 'Name', 'FirstName');
        $this->addColumn('Authors', 'Name', 'string');
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
