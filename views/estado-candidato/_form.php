<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\EstadoCandidato $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="estado-candidato-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
