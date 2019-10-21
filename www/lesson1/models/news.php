<?php
require __DIR__ . '/../functions/functions.php';

//*** Возвращает все новости с базы данных
function News_getAll()
{
    $sql = 'SELECT id,date,title,author FROM news ORDER BY date DESC';
    return sql_query($sql);

}

//*** Всавляет новые строки в существующую таблицу
function News_insert($data)
{
    $sql = "INSERT INTO news (title, text, author)
            VALUES ('" . $data['title'] ."', '" . $data['text'] ."', '" . $data['author'] ."')";
    sql_exec($sql);
}

function ArticleId($id)
{
    $sql = "SELECT * FROM news WHERE id=" . $id;
    return sql_query($sql);
}
