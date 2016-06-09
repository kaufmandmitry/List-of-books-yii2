<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Authors;
use app\modules\admin\models\RelationList;
use app\modules\admin\models\Books;
use yii\web\Controller;
use Yii;

class CrudController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionViewauthors()
    {
        $authors = Authors::getRows();
        return $this->render('viewauthors', ['authors' => $authors]);
    }

    public function actionViewbooks()
    {
        $books = books::getRows();
        return $this->render('viewbooks', ['books' => $books]);
    }



}
