<?php
require_once __DIR__ . '/../autoload.php';

class NewsController
{
    public function actionAll()
    {
        $items = News::News_getAll();
        include __DIR__ . '/../views/news/all.html';
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = News::News_getOne($id);
        include __DIR__ . '/../views/news/one.html';
    }

    public function actionAdd()
    {
        if (!empty($_POST)) {
           $data = [];
           if (isset($_POST['title'])) {
               $data['title'] = $_POST['title'];
           }
           if (isset($_POST['text'])) {
                $data['text'] = $_POST['text'];
           }
           if (isset($_POST['author'])) {
                $data['author'] = $_POST['author'];
           }
           if (isset($data['title']) && isset($data['title']) && isset($data['title'])) {
               News::News_add($data);
               header('Location: /www/lesson3/');
               die;
           }
        }
    }
}