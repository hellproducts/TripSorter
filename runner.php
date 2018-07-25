<?php
define('DS', DIRECTORY_SEPARATOR);
define('JSON_DATA', __DIR__ . DS . 'json-data' . DS . 'cards.json');

require_once __DIR__ . DS . 'vendor' . DS . 'autoload.php';

$jsonCards = file_get_contents(JSON_DATA);
