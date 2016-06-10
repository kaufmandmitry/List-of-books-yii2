<?php use yii\helpers\Html; ?>
<a href="/admin/crud/viewauthors"><?= Html::submitButton('Группировать по авторам', ['class' => 'btn btn-primary']) ?></a>
<a href="/admin/crud/addbook"><?= Html::submitButton('Добавить книгу', ['class' => 'btn btn-success']) ?> </a>
<h2>Группировка по книгам</h2>
<table class="table">
    <tr>
        <th>Книга</th><th>Описание</th><th>Авторы</th><th>Редактирование</th><th>Удаление</th>
    </tr>
    <?php
    foreach ($books as $book) {
        echo "<tr><td>" . $book->Title . "</td>";
        echo "<td>$book->Description</td><td><table>"; //Вывод автора
        foreach($book->authors as $author) {
            echo "<tr><td>" . $author->Name . "</td>";
            echo "<td><a href='/admin/crud/rip/?idauthor=" . $author->Id . "&idbook=" . $book->Id . "'>Разорвать связь</a></td></tr>";
        }
        echo "</table></td><td><a href='/admin/crud/editbook/" . $book->Id . "'>Редактировать книгу</a></td>";
        echo "<td><a href='/admin/crud/deletebook/?id=" . $book->Id . "'>Удалить книгу</a></td></tr>";
    }
    ?>
</table>
