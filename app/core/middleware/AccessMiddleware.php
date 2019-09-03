<?php

namespace app\core\middleware;

use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\UnauthorizedHttpException;

class AccessMiddleware extends \steroids\middleware\AccessMiddleware
{
    /**
     * @inheritdoc
     */
    public static function checkAccess($event)
    {
        // Skip gii and debug modules
        if (in_array($event->action->controller->module->id, ['debug', 'gii'])) {
            return;
        }

        // Skip error action
        if ($event->action->uniqueId === \Yii::$app->errorHandler->errorAction) {
            return;
        }
        $item = \Yii::$app->siteMap->getActiveItem();
        if (!$item) {
            throw new NotFoundHttpException();
        }

        if (!$item->checkVisible($item->normalizedUrl)) {
            if (\Yii::$app->user->isGuest) {
                throw new UnauthorizedHttpException();
            } else {
                throw new ForbiddenHttpException();
            }
        }
    }
}
