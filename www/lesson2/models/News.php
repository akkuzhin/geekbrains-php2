<?php

require __DIR__ . '/../classes/Article.php';
require_once __DIR__ . '/../classes/DB.php';


class News
    extends Article
{
    public static function News_getAll()
    {
        $db = new DB;
        $sql = 'SELECT id,date,title,author FROM news ORDER BY date DESC';
        return $db->sql_query($sql, 'News');
    }


    public static function News_getOne($id)
    {
        $db = new DB();
        $sql = 'SELECT * FROM news WHERE id=' . $id;
        return $db->sql_query($sql, 'News');
    }

    public static function News_insert($data)
    {
        $db = new DB;
        $sql = "INSERT INTO news (title, text, author)
            VALUES ('" . $data['title'] ."', '" . $data['text'] ."', '" . $data['author'] ."')";
        return $db->sql_exec($sql);
    }

    public function News_delete($id)
    {
        $db = new DB;
        $sql = 'DELETE FROM news WHERE id=' . $id;
        return $db->sql_exec($sql);
    }

    public function News_update($data)
    {
        $db = new DB;
        $sql = 'UPDATE news SET title='. $data['title'] . ' text=' . $data['text'] . ' author=' . $data['author'] . 'WHERE id=' . $data['id'];
        return $db->sql_exec($sql);
    }
}