<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => Html::img('imagenes/home.png'),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Inicio', 'url' => ['/site/index']],
                    ['label' => 'Falta Uno', 'url' => ['evento/create']],
                    ['label' => 'Quien Se Suma', 'url' => ['/evento']],
                    ['label' => 'Contacto', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Perfil', 'url' => ['/site/login']] :
                        
                        ['label' => 'Mi Perfil',
                            'url' => ['/usuario/view&id='.Yii::$app->user->id],
                            'linkOptions' => ['data-method' => 'post']],
                
                    Yii::$app->user->isGuest ?
                        ['label' => 'Ingresar', 'url' => ['/site/login']] :
                        
                        ['label' => 'Salir (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
