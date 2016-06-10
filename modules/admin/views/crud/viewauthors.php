<?php use yii\helpers\Html; ?>
<a href="/admin/crud/viewbooks"><?= Html::submitButton('Группировать по книгам', ['class' => 'btn btn-primary']) ?></a>
<a href="/admin/crud/addbook"><?= Html::submitButton('Добавить книгу', ['class' => 'btn btn-success']) ?> </a>
<br>
<h2>Группировка по авторам</h2>
<table class="table">
    <tr>
        <th>Автор</th><th>Книги</th><th>Редактирование</th><th>Удаление</th>
    </tr>
    <?php
    foreach ($authors as $author) {
        echo "<tr><td>" . $author->Name . "</td><td><table>"; //Вывод автора
    foreach($author->books as $book) {  //Вывод книг
        echo "<tr><td>" . $book->Title . "</td>";
        echo "<td><a href='/admin/crud/rip/?idauthor=" . $author->Id . "&idbook=" . $book->Id . "'>Разорвать связь</a></td></tr>";
    }
        echo "</table></td><td><a href='/admin/crud/editauthor/?idauthor=" . $author->Id . "'>Редактировать автора</a></td>";
        echo "<td><a href='/admin/crud/deleteauthor/?id=" . $author->Id . "'>Удалить автора</a></td></tr>";
    }
    ?>

</table>
