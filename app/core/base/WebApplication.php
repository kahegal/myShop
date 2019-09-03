<?php

namespace app\core\base;

use Yii;
use yii\redis\Connection;
use yii\web\Application;

/**
 * Class WebApplication
 * @package app\core\base
 * @property Connection $redis
 */
class WebApplication extends Application
{
    /**
     * @inheritdoc
     */
    protected function bootstrap()
    {
        $versionFilePath = __DIR__ . '/../../../public/version.txt';
        if (file_exists($versionFilePath)) {
            $this->version = trim(file_get_contents($versionFilePath));
        }

        Yii::setAlias('@static', $this->getRequest()->getBaseUrl() . '/static/' . $this->version);

        parent::bootstrap();
    }
}