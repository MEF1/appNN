<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\UsuarioSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_usr') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apellido') ?>

    <?= $form->field($model, 'fecha_nac') ?>

    <?= $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'clave') ?>

    <?php // echo $form->field($model, 'usr') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
