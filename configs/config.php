<?php
/**
 * @Description:
 * @author: gs.Yu
 * Date: 2019/9/29
 */

$db = require  __DIR__ . '/db.php';
$params = require  __DIR__ . '/params.php';

$config = [
    'basePath' => dirname(__DIR__),
    'modules' => 'modules/', //
    'db' => $db,
    'params' => $params,
    'rules' => [
        '' => 'Home/home',
        'test' => 'Test/test',
        'login' => 'v1/Login/loginTest',
        'page' => 'v1/release/page/test',
    ]
];

return $config;