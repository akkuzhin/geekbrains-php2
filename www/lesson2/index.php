<?php

require __DIR__ . '/models/News.php';

$news = News::News_getAll();

include __DIR__ . '/views/news.html';
