<?php

use steroids\helpers\DefaultConfig;

return DefaultConfig::getWebConfig([
    'defaultRoute' => 'site/site/index',
    'components' => [
        'request' => [
            'cookieValidationKey' => 'ie#9TkE?pQ6Vs#zHq$UqyzWoNFQU:SJe',
        ],
        'errorHandler' => [
            'errorAction' => 'shop/shop-api/error',
        ],
        'user' => [
            'class' => '\app\core\components\ContextUser',
            'identityClass' => 'app\user\models\User',
            'enableAutoLogin' => false,
            'loginUrl' => ['/user/auth/login'],
        ],
    ],
]);
