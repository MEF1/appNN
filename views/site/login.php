<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\models\LoginForm $model
 */
$this->title = 'Ingresar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login col-lg-offset-1 col-lg-11">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor llene los siguientes campos para iniciar la sesión :</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput()->label('Usuario') ?>

    <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>

    <code>Para probar sin registrarse -> Usuario: demo , Pass:demo</code>
    
    <?= $form->field($model, 'rememberMe', [
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-2\">{error}</div>",
    ])->checkbox($options = ['label'=>'Recordarme']) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            <?= Html::a('Registrarse', ['usuario/create'], ['class' => 'btn btn-success']) ?>
          
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>