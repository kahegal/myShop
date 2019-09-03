<?php

require(STEROIDS_VENDOR_DIR . '/kozhindev/yii-steroids/backend/base/BaseYii.php');

use steroids\base\BaseYii;
use steroids\base\WebApplication;
use steroids\base\ConsoleApplication;
use app\core\base\FakeApplication;

class Yii extends BaseYii
{
    /**
     * @var WebApplication|ConsoleApplication|FakeApplication
     */
    public static $app;
}
