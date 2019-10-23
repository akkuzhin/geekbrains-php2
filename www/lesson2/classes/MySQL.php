<?php

class MySQL
{
    protected $link;
    protected $data = [];

    public function __construct()
    {
        $config = include __DIR__ . '/../config.php';
        $this->link = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
    }

    public function sql_query($sql)
    {
        $res = mysqli_query($this->link, $sql);
        while(null !== $row = mysqli_fetch_assoc($res)) {
            $this->data[] = $row;
        }
        return $this->data;
    }

    public function sql_execute($sql)
    {
        $res = mysqli_query($this->link, $sql);
        if ($res === true) {
            return true;
        } else {
            return false;
        }
    }
}