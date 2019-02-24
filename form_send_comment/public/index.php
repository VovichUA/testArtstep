<?php
$autoloader = require __DIR__ . './../vendor/autoload.php';
$db = new \Models\MyDB();
$app = new Controllers\MainController($db);
$path = trim($_SERVER["REQUEST_URI"], '/');
if ($path == 'history') {
    $app->renderHistory();
} elseif(!empty($_POST)) {
    $app->processForm($_POST);
} else {
    $app->renderForm();
}