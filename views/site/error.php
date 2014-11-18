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
    <div class="col-md 4 col-md-offset-2">
     <?=Html::img('imagenes/prohibido.png', ['class' => 'img-responsive'])?>
    </div>
</div>