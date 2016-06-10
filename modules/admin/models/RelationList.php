<?php
namespace app\modules\admin\models;

use yii\db\ActiveRecord;

class RelationList extends ActiveRecord  //Промежуточная таблица: IdRow, IdAuthor, IdBook
{
    public static function tableName()
    {
        return 'RelationList';
    }
}


