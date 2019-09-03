<?php

namespace app\core;

use app\core\base\FakeApplication;
use steroids\base\Module;
use steroids\base\WebApplication;
use app\core\middleware\AccessMiddleware;
use steroids\middleware\AjaxResponseMiddleware;
use yii\base\BootstrapInterface;
use yii\helpers\Url;

class CoreModule extends Module implements BootstrapInterface
{
    /**
     * @param FakeApplication|WebApplication $app
     */
    public function bootstrap($app)
    {
        if ($app instanceof WebApplication && !YII_ENV_TEST) {
            AccessMiddleware::register($app);
            AjaxResponseMiddleware::register($app);
            \Yii::$app->frontendState->set('config.resource', [
                'googleApiKey' => '',
            ]);
            \Yii::$app->frontendState->set('config.ui', [
                //'fetchUrl' => Url::to(['/site/api-form/fetch']),
                //'autoCompleteUrl' => Url::to(['/site/api-form/auto-complete']),
                'fields' => [
                    'form.FileField' => [
                        'backendUrl' => Url::to(['/file/upload/index']),
                    ],
                ],
            ]);
        }
    }

}
