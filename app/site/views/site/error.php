<?php

namespace app\views;

use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $name string */
/* @var $message string */
/* @var $exception \Exception */

?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="alert alert-danger">
    <?= nl2br(Html::encode($message)) ?>
</div>
