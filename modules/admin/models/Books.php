<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;
use app\modules\admin\models\Authors;
use app\modules\admin\models\RelationList;

class Books extends ActiveRecord
{
    public static function tableName()
    {
        return 'Books';
    }

    public function getAuthors()
    {
        return $this->hasMany(Authors::className(), ['Id' => 'IdAuthor'])
            ->viaTable('RelationList', ['IdBook' => 'Id']);
    }

    public static function getRows()
    {
        $array = self::find()->all();
        return $array;
    }

}
