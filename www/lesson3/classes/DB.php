<?php

class DB
{
    protected $link;
    public function __construct()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'test');
    }

    public function queryAll($sql, $className = 'stdClass')
    {
        $result = mysqli_query($this->link, $sql);
        $data = [];
        while (NULL != ($obj = mysqli_fetch_object($result, $className))) {
            $data[] = $obj;
        }
        return $data;
    }

    public function queryOne($sql, $className = 'stdClass')
    {
        return $this->queryAll($sql, $className)[0];
    }

    public function sql_exec($sql)
    {
        $result = mysqli_query($this->link, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}