<?php

//*** Устанавливает новое соединение с сервером MySQL
function sql_connect()
{
    $config = include __DIR__ . '/../config.php';
    return mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
}

//*** Посылает запрос MySQL, возвращает ассоциативный массив, соответствующий результирующей выборке или NULL, если других рядов не существует.
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

//*** Выполняет подготовленный запрос
function sql_exec($sql)
{
    $link = sql_connect();
    $res = mysqli_query($link, $sql);
    if ($res) {
        return true;
    } else {
        return false;
    }
}