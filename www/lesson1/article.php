<?php

require __DIR__ . '/models/news.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
}


foreach (ArticleId($id) as $values) {
    $article = $values;
}


include __DIR__ . '/views/article.html';