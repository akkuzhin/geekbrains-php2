<?php

require __DIR__ . '/models/news.php';

$news = News_getAll();

include __DIR__ . '/views/news.html';