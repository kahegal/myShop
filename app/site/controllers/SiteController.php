<?php

namespace app\site\controllers;

use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public static function siteMap()
    {
        return [
            'index' => [
                'url' => ['index'],
                'urlRule' => '/',
            ],
            'error' => [
                'label' => \Yii::t('app', 'Ошибка'),
                'url' => ['/site/site/error'],
                'visible' => false,
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
