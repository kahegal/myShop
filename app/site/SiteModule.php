<?php

namespace app\site;

use steroids\base\Module;
use steroids\base\WebApplication;
use steroids\modules\docs\events\SwaggerExportEvent;
use steroids\modules\docs\models\SwaggerJson;
use yii\base\BootstrapInterface;
use yii\base\Event;
use yii\helpers\Url;

class SiteModule extends Module implements BootstrapInterface
{
    public static function siteMap()
    {
        return [
            'api.user' => [
                'visible' => false,
            ],
        ];
    }

    /**
     * @param WebApplication $app
     */
    public function bootstrap($app)
    {
        if ($app instanceof WebApplication && !YII_ENV_TEST) {
            // Add stream docs api
            Event::on(SwaggerJson::class, SwaggerJson::EVENT_EXPORT, function(SwaggerExportEvent $event) {
                $url = Url::to(['/site/docs-stream/index']);
                $event->json['info']['description'] .= "\n\n[Stream API]($url)";
            });

            $app->on(WebApplication::EVENT_BEFORE_REQUEST, function ($event) {
                \Yii::$app->response->headers->add('Access-Control-Allow-Origin', \Yii::$app->request->headers->get('origin') ?: '*');
                \Yii::$app->response->headers->add('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept, Authorization, Cache-Control, Content-Disposition, If-None-Match, If-Modified-Since');
                \Yii::$app->response->headers->add('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

                if (\Yii::$app->request->isOptions) {
                    \Yii::$app->response->send();
                    exit();
                }
            });
        }
    }
}
