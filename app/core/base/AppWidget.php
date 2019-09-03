<?php

namespace app\core\base;

use steroids\base\Widget;
use yii\helpers\Json;

class AppWidget extends Widget
{
    public static function addTranslationsJson($fileName) {
        $langFile = \Yii::getAlias('@webroot/assets/' . $fileName);
        if (file_exists($langFile)) {
            $translations = [];
            foreach (Json::decode(file_get_contents($langFile)) as $translationString) {
                $translations[$translationString] = \Yii::t('app', $translationString);
            }
            \Yii::$app->frontendState->set('config.locale.translations', $translations);
        }
    }
}
