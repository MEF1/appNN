<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\EventoSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="evento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_evento') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'hora') ?>

    <?= $form->field($model, 'direccion') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'long') ?>

    <?php // echo $form->field($model, 'id_ciudad') ?>

    <?php // echo $form->field($model, 'id_deporte') ?>

    <?php // echo $form->field($model, 'id_tipo') ?>

    <?php // echo $form->field($model, 'id_usuario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
