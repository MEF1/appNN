<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var string $name
 * @var string $message
 * @var Exception $exception
 */

$this->title = MEFU;
?>
<div class="site-error">

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
    <div class="">
     <?=Html::img('imagenes/prohibido.png', ['class' => 'img-responsive center-block'])?>
    </div>
</div>