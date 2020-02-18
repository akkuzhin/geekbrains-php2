<?php

require_once __DIR__ . '/autoload.php';

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'Admin';
$act = isset($_GET['act']) ? $_GET['act'] : 'Add';

$controllerClassName = $ctrl . 'Controller';
$controller = new $controllerClassName;
$method = 'action' . $act;
$controller->$method();