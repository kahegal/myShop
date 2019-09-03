<?php

namespace app\core\components;

use app\auth\models\UserAuth;
use app\user\models\User;
use steroids\components\ContextUser as BaseContextUser;
use yii\web\Request;

class ContextUser extends BaseContextUser
{
    protected function renewAuthStatus()
    {
        // Default auth
        parent::renewAuthStatus();

        // Auth by access token
        if (\Yii::$app->request instanceof Request) {
            $authHeader = \Yii::$app->request->getHeaders()->get('Authorization');
            if (preg_match('/^Bearer\s+(.*?)$/', $authHeader, $matches)) {
                $this->loginByAccessToken($matches[1]);
            } else {
                 $this->setIdentity(null);
            }
        }
    }

}
