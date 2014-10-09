<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\ReputacionSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="reputacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_reputacion') ?>

    <?= $form->field($model, 'comentario') ?>

    <?= $form->field($model, 'positvo') ?>

    <?= $form->field($model, 'negativo') ?>

    <?= $form->field($model, 'id_tipo') ?>

    <?php // echo $form->field($model, 'id_usr') ?>

    <?php // echo $form->field($model, 'id_evento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
