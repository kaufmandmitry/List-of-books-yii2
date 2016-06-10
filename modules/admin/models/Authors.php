<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;

class Authors extends ActiveRecord
{
    public static function tableName()
    {
        return 'Authors';
    }

    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['Id' => 'IdBook'])
            ->viaTable('RelationList', ['IdAuthor' => 'Id']);
    }

    public static function getRows()
    {
        $array = self::find()->all();
        return $array;
    }

}