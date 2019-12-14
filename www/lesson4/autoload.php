<?php

function __autoload($className)
{
    if (file_exists(__DIR__ . '/controllers/' . $className . '.php')) {
        require __DIR__ . '/controllers/' . $className . '.php';
    } elseif (file_exists(__DIR__ . '/models/' . $className . '.php')) {
        require __DIR__ . '/models/' . $className . '.php';
    } elseif (file_exists(__DIR__ . '/classes/' . $className . '.php')) {
        require __DIR__ . '/classes/' . $className . '.php';
    }
}