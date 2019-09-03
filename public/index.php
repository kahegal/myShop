<?php

$config = require dirname(__DIR__) . '/vendor/kozhindev/yii-steroids/backend/boot/bootstrap.php';
require dirname(__DIR__) . '/app/core/base/Yii.php';
(new \steroids\base\WebApplication($config))->run();