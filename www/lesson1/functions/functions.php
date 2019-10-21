<?php
//Устанавливает новое соединение с сервером MySQL
function sql_connect()
{
    return mysqli_connect('localhost', 'root', '', 'test');
}

function sql_query($sql)
{
    $link = sql_connect();
    $res = mysqli_query($link, $sql);
    $ret = [];
    while (null !== $row = mysqli_fetch_assoc($res)) {
        $ret[] = $row;
    }
    return $ret;
}

function sql_execute($sql)
{
    $link = sql_connect();
    $res = mysqli_query($link, $sql);
    if ($res) {
        return true;
    } else {
        return false;
    }
}