<?php
require_once __DIR__ . '/../autoload.php';

abstract class AbstractModel {

    protected static $table; //в какой таблице лежат данные

    protected $data = [];
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __isset($name)
    {
         return isset($this->data[$name]);
    }

    public static function findAll()
    {
        $class = get_called_class(); //Получаем имя класса, с помощью позднего статического связывания
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql);
    }

    public static function findOneByPk($id)
    {
        $class = get_called_class(); //Получаем имя класса, с помощью позднего статического связывания
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql, [':id'=>$id])[0];
    }

    public static function findByColumn($column, $value)
    {
        $class = get_called_class(); //Получаем имя класса, с помощью позднего статического связывания
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:' . $column;
        $db = new DB();
        $db->setClassName($class);
        $data[':'.$column] = $value;
        return $db->query($sql, [$data])[0];
    }

    protected function insert()
    {
        $cols = array_keys($this->data);
        $data = [];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }
        $sql = 'INSERT INTO ' . static::$table . ' 
                ('. implode(',', $cols).') 
                VALUES 
                ('.implode(',', array_keys($data)).')';
        $db = new DB();
        $res = $db->execute($sql, $data);
        if ($res) {
            $this->id = $db->lastInsertId();
        }
    }

    protected function update()
    {
        $files = [];
        $values = [];
        foreach ($this->data as $k => $v) {
            $values[':' . $k] = $v;
            if ('id' == $k) {
                continue;
            }
            $files[] = $k . '=:' . $k;
        }

        $sql = 'UPDATE ' . static::$table . ' 
                SET ' . implode(',', $files) . ' 
                WHERE id=:id';
        $db = new DB();
        $db->execute($sql, $values);
    }

    public function delete()
    {
        $db = new DB();
        $sql = 'DELETE FROM '. static::$table . '
                 WHERE id=:id';
        $db->execute($sql, [':id'=>$this->data['id']]);
    }

    public function save()
    {
        if (isset($this->id)) {
            return $this->update();
        } else {
            return $this->insert();
        }
    }
}

        
