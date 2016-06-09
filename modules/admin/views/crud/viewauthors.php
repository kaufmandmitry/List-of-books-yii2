<a href="/admin/crud/viewbooks">Показать книги и их авторов</a><br>
<h2>Список авторов и их книг</h2>
<table class="table">
    <tr>
        <th>Автор</th><th>Книги</th><th>Редактирование</th><th>Удаление</th>
    </tr>
    <?php
    foreach ($authors as $author) {
        echo "<tr><td>" . $author->Name . "</td><td>"; //Вывод автора
    foreach($author->books as $book) {
        echo $book->Title . "<br>";
    }
        echo "</td><td><a href='/admin/crud/editauthor/" . $author->Id . "'>Редактировать автора</a></td>";
        echo "<td><a href='/admin/crud/deleteauthor/" . $author->Id . "'>Удалить автора</a></td></tr>";
    }
    ?>

</table>
