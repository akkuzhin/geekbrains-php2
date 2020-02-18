<?php
require_once __DIR__ . '/../autoload.php';

class AdminController
{
    public function actionAdd()
    {
        include __DIR__ . '/../views/admin/add.html';
    }
    public function actionInsert()
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
                $news = new News();
                $news->title = $data['title'];
                $news->text = $data['text'];
                $news->author = $data['author'];
                $news->save();
                header('Location: /lesson5/');
                exit;
            }
        }
    }
    public function actionUpdate()
    {
        $article = new News();
        $article->id = (int)$_POST['id'];
        $article->title = (string)$_POST['title'];
        $article->text = (string)$_POST['text'];
        $article->author = (string)$_POST['author'];
        $article->save();
        header('Location: /lesson5/');
        exit;
    }

    public function actionDelete()
    {
        $article = new News();
        $article->id = $_GET['id'];
        $article->delete();
        header('Location: /lesson5/');
        exit;

    }
}