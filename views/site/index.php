<?php
use yii\helpers\Html;
/**
 * @var yii\web\View $this
 */
$this->title = 'MEFU app';
?>
<div class="site-index">
    
    <div class="col-md-9">
            <?=Html::img('imagenes/22.png', ['class' => 'img-responsive'])?>
    </div>
    <div class="col-md-3 jumbotron">
        <p><?= Yii::$app->user->isGuest ?
                        Html::a('Ingresar', ['site/login'], ['class' => 'btn btn-success btn-xs']) :
                        Html::a('Mi Perfil', ['/usuario/view&id='.Yii::$app->user->id], ['class' => 'btn btn-success btn-xs'])?>         
        </p>
        <p><?= Html::a('Falta Uno', ['evento/create'], ['class' => 'btn btn-success btn-xs']) ?></p>
        <p><?= Html::a('Quien Se Suma', ['evento/index'], ['class' => 'btn btn-success btn-xs']) ?></p>
        <p>Descargá la APP</p>   
        <?=Html::img('imagenes/qr.png', ['class' => 'img-responsive'])?>
    </div>

    <div class="body-content"></div>
</div>