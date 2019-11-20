<?php
require __DIR__ . '/models/News.php';

if (!isset($_GET['id'])) {
   header('Location: /index.php');
   die;
}
$id = (int)$_GET['id'];
$article = News::News_getOne($id)[0];

include __DIR__ . '/views/article.html';