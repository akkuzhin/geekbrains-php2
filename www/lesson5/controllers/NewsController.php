<?php
require_once __DIR__ . '/../autoload.php';

class NewsController
{
    //Получении всех новостей
    public function actionAll()
    {
        $view = new View();
        $view->news = News::findAll();
        $view->display('news/all.html');
    }

    public function actionOne()
    {
        $id = (int)$_GET['id'];
        $view = new View();
        $view->article = News::findOneByPk($id);
        $view->display('news/one.html');
    }

    public function actionUpdate()
    {
        $id = (int)$_GET['id'];
        $view = new View();
        $view->article = News::findOneByPk($id);
        $view->display('admin/edit.html');
    }

}