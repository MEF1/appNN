<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Reputacion $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="reputacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'comentario')->textInput(['maxlength' => 140]) ?>

    <?= $form->field($model, 'positvo')->textInput() ?>

    <?= $form->field($model, 'negativo')->textInput() ?>

    <?= $form->field($model, 'id_tipo')->textInput() ?>

    <?= $form->field($model, 'id_usr')->textInput() ?>

    <?= $form->field($model, 'id_evento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
