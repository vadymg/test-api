<?php

require_once __DIR__ . '/../vendor/autoload.php';

header('Content-Type: application/json; charset=utf-8');

$request = new \TestApiTest\Request(
    new \TestApiTest\Storage\FileStorage(__DIR__ . '/../storage/data.json'),
    new \TestApiTest\Validator(),
    new \TestApiTest\SensitiveDataModifier(),
);

$request->handle();