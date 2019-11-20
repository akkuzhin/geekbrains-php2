<?php
require __DIR__ . '/models/News.php';

if (!empty($_POST)) {
    $data = [];
    if (!empty($_POST['title'])) {
        $data['title'] = $_POST['title'];
    }
    if (!empty($_POST['text'])) {
        $data['text'] = $_POST['text'];
    }
    if (!empty($_POST['author'])) {
        $data['author'] = $_POST['author'];
    }

    if (isset($data['title'])
        && isset($data['text'])
        && isset($data['author'])) {

        News::News_insert($data);
    }
}
header('Location: /lesson2/index.php');
die;