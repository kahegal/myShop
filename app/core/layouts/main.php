<?php

namespace app\views;

use Yii;
use yii\helpers\Html;
use steroids\widgets\ModalWrapper;

/* @var $this \yii\web\View */
/* @var $content string */

// Render widgets before FrontendState register
//$modalWidget = ModalWrapper::widget();

Yii::$app->frontendState->register($this);

?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= \Yii::$app->language ?>">
    <head>
        <meta charset="<?= \Yii::$app->charset ?>">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode(Yii::$app->siteMap->getFullTitle()) ?></title>
        <?= Html::cssFile('@static/assets/bundle-style.css') ?>
        <?php $this->head() ?>
        <?= Html::jsFile('@static/assets/bundle-common.js') ?>
        <?= Html::jsFile('@static/assets/bundle-index.js') ?>
        <?= $this->render('_sentry') ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <div class="container-fluid mr-5 ml-5 mb-5 mt-5">
        <div class="col-11">
            <?= $content ?>
        </div>
    </div>
    <?php $this->endBody() ?>

    </body>
    </html>
    <?php $this->endPage() ?>