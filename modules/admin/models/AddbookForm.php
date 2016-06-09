<?php

namespace app\modules\admin\models;

use yii\base\Model;

class AddbookForm extends Model
{
    public $author;
    public $book;
    public $description;

    public function rules()
    {
        return [
            [['author', 'book'], 'required'],
        ];
    }
}