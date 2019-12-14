<?php
require_once __DIR__ . '/../autoload.php';

abstract class AbstractModel
   implements IModel
{
    protected static $table = 'abstract';
    protected static $class = 'AbstractModel';

    public static function News_getAll()
    {
        $db = new DB();
        return $db->queryAll('SELECT * FROM ' . static::$table . ' ORDER BY date DESC', static::$class);
    }

    public static function News_getOne($id)
    {
        $db = new DB();
        return $db->queryOne('SELECT * FROM '.static::$table .' WHERE id=' . $id, static::$class);
    }
    public static function News_add($data)
    {
        $db = new DB();
        $sql = "INSERT INTO " . static::$table . "(title, text, author)
            VALUES ('" . $data['title'] ."', '" . $data['text'] ."', '" . $data['author'] ."')";
        return $db->sql_exec($sql);
    }

}
        
