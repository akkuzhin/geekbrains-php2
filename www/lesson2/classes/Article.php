<?php

abstract class Article
{
    public $id;
    public $date;
    public $title;
    public $text;
    public $author;

    abstract public static function News_getAll(); //Получить все новости
    abstract public static function News_getOne($id);  //Получить одну новость
}