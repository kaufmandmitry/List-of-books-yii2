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
    public $defaultAction = 'viewbooks';

    public function actionViewauthors() //Вывод данных с группировкой по авторам
    {
        $authors = Authors::getRows();
        return $this->render('viewauthors', ['authors' => $authors]);
    }

    public function actionViewbooks()   //Вывод книг с группировкой по книгам
    {
        $books = books::getRows();
        return $this->render('viewbooks', ['books' => $books]);
    }

    public function actionAddbook()     //Добавление книги
    {
        $model = new AddbookForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $author = Authors::find()->where(['Name' => $_POST['AddbookForm']['author']])->one(); //Ищем автора
            if(!isset($author)) {                                                    //Если такого автора нет, добавляем
                $author = new Authors;
                $author->Name = $_POST['AddbookForm']['author'];
            }

            $book = Books::find()->where(['Title' => $_POST['AddbookForm']['book']])->one();//Ищем книгу
            if(!isset($book)) {                                                    //Если такой книги нет, добавляем
                $book = new Books;
                $book->Title = $_POST['AddbookForm']['book'];
            }
            $book->Description = $_POST['AddbookForm']['description'];
            $author->save();
            $book->save();
            $author->link('books', $book);
            return $this->redirect("/admin/crud/viewbooks");
        }
        else {
            return $this->render('addbook', ['model' => $model]);
        }
    }

    public function actionDeletebook($id)   //Удаление книги
    {
        $book = Books::findOne($id);
        $book->delete();
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDeleteauthor($id) //Удаление автора
    {
        $author = Authors::findOne($id);
        $author->delete();
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionRip($idbook, $idauthor)  //Разрыв связи между книгой и автором
    {
        $book = Books::find()->where(['id' => $idbook])->one();
        $author= Authors::find()->where(['id' => $idauthor])->one();
        $book->unlink('authors', $author, true);
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionEditbook($idbook)     //Изменить данные книги: название, описание
    {
        $book = Books::findOne($idbook);
        if ($book->load(Yii::$app->request->post())) {
            $book->Title = $_POST['Books']['Title'];
            $book->Description = $_POST['Books']['Description'];
            $book->save();
            return $this->redirect("/admin/crud/viewbooks");
        }
        else {
            return $this->render('editbook', ['book' => $book]);
        }
    }

    public function actionEditauthor($idauthor)  //Изменить данные автора: имя
    {
        $author = Authors::findOne($idauthor);
        if ($author->load(Yii::$app->request->post())) {
            $author->Name = $_POST['Authors']['Name'];
            $author->save();
            return $this->redirect("/admin/crud/viewauthors");
        }
        else {
            return $this->render('editauthor', ['author' => $author]);
        }
    }
}
