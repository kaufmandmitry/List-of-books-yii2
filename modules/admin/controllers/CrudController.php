<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\AddbookForm;
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

    public function actionAddbook()
    {
        $model = new AddbookForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $author = Authors::find()->where(['Name' => $_POST['AddbookForm']['author']])->one(); //Ищем автора
            if(!isset($author)) {                                                    //Если такого автора нет, добавляем
                $author = new Authors;
                $author->Name = $_POST['AddbookForm']['author'];
                $author->save();
            }

            $book = Books::find()->where(['Title' => $_POST['AddbookForm']['book']])->one();
            if(!isset($book)) {                                                    //Если такой книги нет, добавляем
                $book = new Books;
                $book->Title = $_POST['AddbookForm']['book'];
                $book->Description = $_POST['AddbookForm']['description'];
                $book->save();
            }
            $author->link('books', $book);
            return $this->redirect("/admin/crud/viewauthors");
        }
        else {
            return $this->render('addbook', ['model' => $model]);
        }
    }
}
