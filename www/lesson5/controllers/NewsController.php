<?php
require_once __DIR__ . '/../autoload.php';

class NewsController
{
    public function actionAll()
    {
        $news = News::News_getAll();
        $view = new View();
        $view->items = $news;

        $view->display('news/all.html');
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $news = News::News_getOne($id);
        $view = new View();
        $view->item = $news;
        $view->display('news/one.html');
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
               header('Location: /lesson4/index.php');
               die;
           }
        }
    }
}