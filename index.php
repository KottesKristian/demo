<?php
define("ROOT", getcwd());
define("BP",substr(ROOT, strlen($_SERVER['DOCUMENT_ROOT'])));
define("DS", DIRECTORY_SEPARATOR);
define('PATH', explode('index', __DIR__)[1].'/');
include ROOT . '/app/bootstrap.php';

