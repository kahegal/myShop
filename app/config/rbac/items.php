<?php
return [
    'a::error' => [
        'type' => 2,
        'description' => 'error',
    ],
    'a::docs' => [
        'type' => 2,
        'description' => 'docs',
        'children' => [
            'a::docs::self',
            'a::docs::json',
        ],
    ],
    'a::docs::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::docs::json' => [
        'type' => 2,
        'description' => 'json',
    ],
    'a::file' => [
        'type' => 2,
        'description' => 'file',
        'children' => [
            'a::file::self',
            'a::file::upload',
            'a::file::upload-editor',
            'a::file::download',
            'a::file::crop',
        ],
    ],
    'a::file::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::file::upload' => [
        'type' => 2,
        'description' => 'upload',
    ],
    'a::file::upload-editor' => [
        'type' => 2,
        'description' => 'upload-editor',
    ],
    'a::file::download' => [
        'type' => 2,
        'description' => 'download',
    ],
    'a::gii' => [
        'type' => 2,
        'description' => 'gii',
        'children' => [
            'a::gii::self',
            'a::gii::gii',
        ],
    ],
    'a::gii::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::gii::gii' => [
        'type' => 2,
        'description' => 'gii',
        'children' => [
            'a::gii::gii::self',
            'a::gii::gii::gii-children',
        ],
    ],
    'a::gii::gii::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::gii::gii::gii-children' => [
        'type' => 2,
        'description' => 'gii-children',
    ],
    'a::api' => [
        'type' => 2,
        'description' => 'api',
        'children' => [
            'a::api::self',
            'a::api::api-gii',
            'a::api::user',
        ],
    ],
    'a::api::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::api::api-gii' => [
        'type' => 2,
        'description' => 'api-gii',
        'children' => [
            'a::api::api-gii::self',
            'a::api::api-gii::api-get-entities',
            'a::api::api-gii::api-class-save',
            'a::api::api-gii::api-get-permissions',
            'a::api::api-gii::api-permissions-save',
        ],
    ],
    'a::api::api-gii::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::api::api-gii::api-get-entities' => [
        'type' => 2,
        'description' => 'api-get-entities',
    ],
    'a::api::api-gii::api-class-save' => [
        'type' => 2,
        'description' => 'api-class-save',
    ],
    'a::api::api-gii::api-get-permissions' => [
        'type' => 2,
        'description' => 'api-get-permissions',
    ],
    'a::api::api-gii::api-permissions-save' => [
        'type' => 2,
        'description' => 'api-permissions-save',
    ],
    'a::api::user' => [
        'type' => 2,
        'description' => 'user',
        'children' => [
            'a::api::user::self',
            'a::api::user::login',
            'a::api::user::logout',
            'a::api::user::recovery-send',
            'a::api::user::recovery-change',
            'a::api::user::registration',
            'a::api::user::registration-email-confirm',
        ],
    ],
    'a::api::user::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::api::user::login' => [
        'type' => 2,
        'description' => 'login',
    ],
    'a::api::user::logout' => [
        'type' => 2,
        'description' => 'logout',
    ],
    'a::api::user::recovery-send' => [
        'type' => 2,
        'description' => 'recovery-send',
    ],
    'a::api::user::recovery-change' => [
        'type' => 2,
        'description' => 'recovery-change',
    ],
    'a::api::user::registration' => [
        'type' => 2,
        'description' => 'registration',
    ],
    'a::api::user::registration-email-confirm' => [
        'type' => 2,
        'description' => 'registration-email-confirm',
    ],
    'a::steroids-api' => [
        'type' => 2,
        'description' => 'steroids-api',
        'children' => [
            'a::steroids-api::self',
            'a::steroids-api::fields-fetch',
            'a::steroids-api::meta-fetch',
        ],
    ],
    'a::steroids-api::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::steroids-api::fields-fetch' => [
        'type' => 2,
        'description' => 'fields-fetch',
    ],
    'a::user' => [
        'type' => 2,
        'description' => 'user',
        'children' => [
            'a::user::self',
            'a::user::auth',
            'a::user::registration',
        ],
    ],
    'a::user::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::user::auth' => [
        'type' => 2,
        'description' => 'auth',
        'children' => [
            'a::user::auth::self',
            'a::user::auth::login',
            'a::user::auth::logout',
            'a::user::auth::recovery',
        ],
    ],
    'a::user::auth::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::user::auth::login' => [
        'type' => 2,
        'description' => 'login',
    ],
    'a::user::auth::logout' => [
        'type' => 2,
        'description' => 'logout',
    ],
    'a::user::auth::recovery' => [
        'type' => 2,
        'description' => 'recovery',
        'children' => [
            'a::user::auth::recovery::self',
            'a::user::auth::recovery::change',
        ],
    ],
    'a::user::auth::recovery::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::user::auth::recovery::change' => [
        'type' => 2,
        'description' => 'change',
    ],
    'a::user::registration' => [
        'type' => 2,
        'description' => 'registration',
        'children' => [
            'a::user::registration::self',
            'a::user::registration::success',
            'a::user::registration::agreement',
            'a::user::registration::email',
            'a::user::registration::sms',
        ],
    ],
    'a::user::registration::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::user::registration::success' => [
        'type' => 2,
        'description' => 'success',
    ],
    'a::user::registration::agreement' => [
        'type' => 2,
        'description' => 'agreement',
    ],
    'a::index' => [
        'type' => 2,
        'description' => 'index',
    ],
    'guest' => [
        'type' => 1,
        'children' => [
            'a::index',
            'a::docs',
            'a::change-user',
            'a::charge-balance',
            'a::create-product',
            'a::create-user',
            'a::get-products',
            'm::app\\shop\\models\\Product',
            'm::app\\shop\\models\\Purchase',
            'm::app\\user\\models\\User',
            'a::buy',
            'a::get-purchase',
            'a::get-history',
            'm::app\\shop\\models\\UserHistory',
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'a::index',
            'a::docs',
        ],
    ],
    'customer' => [
        'type' => 1,
    ],
    'driver' => [
        'type' => 1,
    ],
    'a::steroids-api::meta-fetch' => [
        'type' => 2,
        'description' => 'meta-fetch',
    ],
    'a::file::crop' => [
        'type' => 2,
        'description' => 'crop',
    ],
    'a::user::registration::email' => [
        'type' => 2,
        'description' => 'email',
        'children' => [
            'a::user::registration::email::self',
            'a::user::registration::email::email-confirm',
        ],
    ],
    'a::user::registration::email::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::user::registration::email::email-confirm' => [
        'type' => 2,
        'description' => 'email-confirm',
    ],
    'a::user::registration::sms' => [
        'type' => 2,
        'description' => 'sms',
        'children' => [
            'a::user::registration::sms::self',
            'a::user::registration::sms::sms-confirm',
        ],
    ],
    'a::user::registration::sms::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::user::registration::sms::sms-confirm' => [
        'type' => 2,
        'description' => 'sms-confirm',
    ],
    'a::create-user' => [
        'type' => 2,
        'description' => 'create-user',
    ],
    'a::create-product' => [
        'type' => 2,
        'description' => 'create-product',
    ],
    'a::charge-balance' => [
        'type' => 2,
        'description' => 'charge-balance',
    ],
    'a::change-user' => [
        'type' => 2,
        'description' => 'change-user',
    ],
    'm::app\\shop\\models\\Product' => [
        'type' => 2,
        'description' => 'app\\shop\\models\\Product',
        'children' => [
            'm::app\\shop\\models\\Product::view',
            'm::app\\shop\\models\\Product::create',
            'm::app\\shop\\models\\Product::update',
            'm::app\\shop\\models\\Product::delete',
            'm::app\\shop\\models\\Product::id',
            'm::app\\shop\\models\\Product::title',
            'm::app\\shop\\models\\Product::price',
            'm::app\\shop\\models\\Product::createTime',
        ],
    ],
    'm::app\\shop\\models\\Product::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\shop\\models\\Product::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::app\\shop\\models\\Product::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'm::app\\shop\\models\\Product::delete' => [
        'type' => 2,
        'description' => 'delete',
    ],
    'm::app\\shop\\models\\Product::id' => [
        'type' => 2,
        'description' => 'id',
        'children' => [
            'm::app\\shop\\models\\Product::id::view',
        ],
    ],
    'm::app\\shop\\models\\Product::id::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\shop\\models\\Product::title' => [
        'type' => 2,
        'description' => 'title',
        'children' => [
            'm::app\\shop\\models\\Product::title::view',
            'm::app\\shop\\models\\Product::title::create',
            'm::app\\shop\\models\\Product::title::update',
        ],
    ],
    'm::app\\shop\\models\\Product::title::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\shop\\models\\Product::title::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::app\\shop\\models\\Product::title::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'm::app\\shop\\models\\Product::price' => [
        'type' => 2,
        'description' => 'price',
        'children' => [
            'm::app\\shop\\models\\Product::price::view',
            'm::app\\shop\\models\\Product::price::create',
            'm::app\\shop\\models\\Product::price::update',
        ],
    ],
    'm::app\\shop\\models\\Product::price::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\shop\\models\\Product::price::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::app\\shop\\models\\Product::price::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'm::app\\shop\\models\\Product::createTime' => [
        'type' => 2,
        'description' => 'createTime',
        'children' => [
            'm::app\\shop\\models\\Product::createTime::view',
        ],
    ],
    'm::app\\shop\\models\\Product::createTime::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\shop\\models\\Purchase' => [
        'type' => 2,
        'description' => 'app\\shop\\models\\Purchase',
        'children' => [
            'm::app\\shop\\models\\Purchase::view',
            'm::app\\shop\\models\\Purchase::create',
            'm::app\\shop\\models\\Purchase::update',
            'm::app\\shop\\models\\Purchase::delete',
            'm::app\\shop\\models\\Purchase::id',
            'm::app\\shop\\models\\Purchase::userId',
            'm::app\\shop\\models\\Purchase::productId',
            'm::app\\shop\\models\\Purchase::createTime',
        ],
    ],
    'm::app\\shop\\models\\Purchase::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\shop\\models\\Purchase::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::app\\shop\\models\\Purchase::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'm::app\\shop\\models\\Purchase::delete' => [
        'type' => 2,
        'description' => 'delete',
    ],
    'm::app\\shop\\models\\Purchase::id' => [
        'type' => 2,
        'description' => 'id',
        'children' => [
            'm::app\\shop\\models\\Purchase::id::view',
        ],
    ],
    'm::app\\shop\\models\\Purchase::id::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\shop\\models\\Purchase::userId' => [
        'type' => 2,
        'description' => 'userId',
        'children' => [
            'm::app\\shop\\models\\Purchase::userId::view',
            'm::app\\shop\\models\\Purchase::userId::create',
            'm::app\\shop\\models\\Purchase::userId::update',
        ],
    ],
    'm::app\\shop\\models\\Purchase::userId::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\shop\\models\\Purchase::userId::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::app\\shop\\models\\Purchase::userId::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'm::app\\shop\\models\\Purchase::productId' => [
        'type' => 2,
        'description' => 'productId',
        'children' => [
            'm::app\\shop\\models\\Purchase::productId::view',
            'm::app\\shop\\models\\Purchase::productId::create',
            'm::app\\shop\\models\\Purchase::productId::update',
        ],
    ],
    'm::app\\shop\\models\\Purchase::productId::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\shop\\models\\Purchase::productId::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::app\\shop\\models\\Purchase::productId::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'm::app\\shop\\models\\Purchase::createTime' => [
        'type' => 2,
        'description' => 'createTime',
        'children' => [
            'm::app\\shop\\models\\Purchase::createTime::view',
        ],
    ],
    'm::app\\shop\\models\\Purchase::createTime::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\user\\models\\User' => [
        'type' => 2,
        'description' => 'app\\user\\models\\User',
        'children' => [
            'm::app\\user\\models\\User::view',
            'm::app\\user\\models\\User::create',
            'm::app\\user\\models\\User::update',
            'm::app\\user\\models\\User::delete',
            'm::app\\user\\models\\User::id',
            'm::app\\user\\models\\User::createTime',
            'm::app\\user\\models\\User::name',
            'm::app\\user\\models\\User::balance',
        ],
    ],
    'm::app\\user\\models\\User::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\user\\models\\User::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::app\\user\\models\\User::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'm::app\\user\\models\\User::delete' => [
        'type' => 2,
        'description' => 'delete',
    ],
    'm::app\\user\\models\\User::id' => [
        'type' => 2,
        'description' => 'id',
        'children' => [
            'm::app\\user\\models\\User::id::view',
        ],
    ],
    'm::app\\user\\models\\User::id::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\user\\models\\User::createTime' => [
        'type' => 2,
        'description' => 'createTime',
        'children' => [
            'm::app\\user\\models\\User::createTime::view',
        ],
    ],
    'm::app\\user\\models\\User::createTime::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\user\\models\\User::name' => [
        'type' => 2,
        'description' => 'name',
        'children' => [
            'm::app\\user\\models\\User::name::view',
            'm::app\\user\\models\\User::name::create',
            'm::app\\user\\models\\User::name::update',
        ],
    ],
    'm::app\\user\\models\\User::name::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\user\\models\\User::name::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::app\\user\\models\\User::name::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'm::app\\user\\models\\User::balance' => [
        'type' => 2,
        'description' => 'balance',
        'children' => [
            'm::app\\user\\models\\User::balance::view',
            'm::app\\user\\models\\User::balance::create',
            'm::app\\user\\models\\User::balance::update',
        ],
    ],
    'm::app\\user\\models\\User::balance::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\user\\models\\User::balance::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::app\\user\\models\\User::balance::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'a::get-products' => [
        'type' => 2,
        'description' => 'get-products',
    ],
    'a::buy' => [
        'type' => 2,
        'description' => 'buy',
    ],
    'a::get-purchase' => [
        'type' => 2,
        'description' => 'get-purchase',
    ],
    'a::get-history' => [
        'type' => 2,
        'description' => 'get-history',
    ],
    'm::app\\shop\\models\\UserHistory' => [
        'type' => 2,
        'description' => 'app\\shop\\models\\UserHistory',
        'children' => [
            'm::app\\shop\\models\\UserHistory::view',
            'm::app\\shop\\models\\UserHistory::create',
            'm::app\\shop\\models\\UserHistory::update',
            'm::app\\shop\\models\\UserHistory::delete',
            'm::app\\shop\\models\\UserHistory::id',
            'm::app\\shop\\models\\UserHistory::userId',
            'm::app\\shop\\models\\UserHistory::changeBalanceType',
            'm::app\\shop\\models\\UserHistory::createTime',
            'm::app\\shop\\models\\UserHistory::delta',
        ],
    ],
    'm::app\\shop\\models\\UserHistory::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\shop\\models\\UserHistory::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::app\\shop\\models\\UserHistory::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'm::app\\shop\\models\\UserHistory::delete' => [
        'type' => 2,
        'description' => 'delete',
    ],
    'm::app\\shop\\models\\UserHistory::id' => [
        'type' => 2,
        'description' => 'id',
        'children' => [
            'm::app\\shop\\models\\UserHistory::id::view',
        ],
    ],
    'm::app\\shop\\models\\UserHistory::id::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\shop\\models\\UserHistory::userId' => [
        'type' => 2,
        'description' => 'userId',
        'children' => [
            'm::app\\shop\\models\\UserHistory::userId::view',
            'm::app\\shop\\models\\UserHistory::userId::create',
            'm::app\\shop\\models\\UserHistory::userId::update',
        ],
    ],
    'm::app\\shop\\models\\UserHistory::userId::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\shop\\models\\UserHistory::userId::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::app\\shop\\models\\UserHistory::userId::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'm::app\\shop\\models\\UserHistory::changeBalanceType' => [
        'type' => 2,
        'description' => 'changeBalanceType',
        'children' => [
            'm::app\\shop\\models\\UserHistory::changeBalanceType::view',
            'm::app\\shop\\models\\UserHistory::changeBalanceType::create',
            'm::app\\shop\\models\\UserHistory::changeBalanceType::update',
        ],
    ],
    'm::app\\shop\\models\\UserHistory::changeBalanceType::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\shop\\models\\UserHistory::changeBalanceType::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::app\\shop\\models\\UserHistory::changeBalanceType::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'm::app\\shop\\models\\UserHistory::createTime' => [
        'type' => 2,
        'description' => 'createTime',
        'children' => [
            'm::app\\shop\\models\\UserHistory::createTime::view',
        ],
    ],
    'm::app\\shop\\models\\UserHistory::createTime::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\shop\\models\\UserHistory::delta' => [
        'type' => 2,
        'description' => 'delta',
        'children' => [
            'm::app\\shop\\models\\UserHistory::delta::view',
            'm::app\\shop\\models\\UserHistory::delta::create',
            'm::app\\shop\\models\\UserHistory::delta::update',
        ],
    ],
    'm::app\\shop\\models\\UserHistory::delta::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\shop\\models\\UserHistory::delta::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::app\\shop\\models\\UserHistory::delta::update' => [
        'type' => 2,
        'description' => 'update',
    ],
];
