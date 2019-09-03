<?php

use steroids\helpers\DefaultConfig;

return DefaultConfig::getMainConfig([
    'id' => 'shop',
    'name' => 'shop',
    'language' => 'en',
    'timeZone' => 'UTC',
    'layout' => '@app/core/layouts/main',
    'components' => [
        'db' => [
            'dsn' => 'mysql:host=localhost;dbname=shop',
            'username' => '',
            'password' => '',
        ],
    ],
    'modules' => [
        'user' => [
            'modelsMap' => [
                'User' => '\app\user\models\User',
            ],
        ],
        'file' => [
            'processors' => [
                'avatar' => [
                    'class' => '\steroids\modules\file\processors\ImageFitWithCrop',
                    'width' => 300,
                    'height' => 400,
                ],
            ],
        ],
    ],
]);

