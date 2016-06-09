<?php use yii\helpers\Html; ?>
<a href="/admin/crud/viewauthors"><?= Html::submitButton('Упорядочить по авторам', ['class' => 'btn btn-primary']) ?></a>
<a href="/admin/crud/addbook"><?= Html::submitButton('Добавить книгу', ['class' => 'btn btn-success']) ?> </a>
<h2>Список книг и их авторов</h2>
<table class="table">
    <tr>
        <th>Книга</th><th>Авторы</th><th>Редактирование</th><th>Удаление</th>
    </tr>
    <?php
    foreach ($books as $book) {
        echo "<tr><td>" . $book->Title . "</td><td>"; //Вывод автора
        foreach($book->authors as $author) {
            echo $author->Name . "<br>";
        }
        echo "</td><td><a href='/admin/crud/editbook/" . $book->Id . "'>Редактировать книгу</a></td>";
        echo "<td><a href='/admin/crud/deletebook/" . $book->Id . "'>Удалить книгу</a></td></tr>";
    }
    ?>

</table>
