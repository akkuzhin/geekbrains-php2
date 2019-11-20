<?php

class DB
{
    protected $link;
    public function __construct()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'test');
    }

    public function sql_query($sql, $className = 'stdClass')
    {
        $result = mysqli_query($this->link, $sql);
        $data = [];
        while (NULL != ($obj = mysqli_fetch_object($result, $className))) {
            $data[] = $obj;
        }
        return $data;
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