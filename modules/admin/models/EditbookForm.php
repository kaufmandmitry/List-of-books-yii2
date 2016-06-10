<?php

namespace app\modules\admin\models;

use yii\base\Model;

class EditbookForm extends Model
{
    public $book;
    public $description;
    public function rules()
    {
        return [
            [['book'], 'required'],
        ];
    }
}