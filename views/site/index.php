<?php
use yii\helpers\Html;
/**
 * @var yii\web\View $this
 */
$this->title = 'MEFU app';
?>
<div class="site-index">
    
    <div class="col-md-offset-2">
        <?=Html::img('imagenes/logoAppNN.png', ['class' => 'img-responsive'])?>
    </div>
    <div class="col-md-offset-3">
        <?=Html::img('imagenes/33.png', ['class' => 'img-responsive'])?>
    </div>
    
    <div class="jumbotron col-md-8 col-md-offset-2">
        <p> 
            <?= Html::a('Falta Uno', ['evento/create'], ['class' => 'btn btn-primary btn-xs']) ?>
            <?= Html::a('Quien Se Suma', ['evento/index'], ['class' => 'btn btn-primary btn-xs']) ?>
            <?= 
                Yii::$app->user->isGuest ?
                        Html::a('Login', ['site/login'], ['class' => 'btn btn-primary btn-xs']) :
                        Html::a('Mi Perfil', ['/usuario/view&id='.Yii::$app->user->id], ['class' => 'btn btn-primary btn-xs'])
            ?>            
            

        </p>
        <p><?= Html::a('Conocé la APP', ['site/about'], ['class' => 'btn btn-lg btn-success']) ?></p>
    </div>

    <div class="body-content"></div>
</div>