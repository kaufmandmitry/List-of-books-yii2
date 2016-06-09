<?php
namespace app\modules\admin\models;

use yii\db\ActiveRecord;

class RelationList extends ActiveRecord
{
    public static function tableName()
    {
        return 'RelationList';
    }

    public static function getRows()
    {
        $array = self::find()->asArray()->all();
        return $array;
    }


}


