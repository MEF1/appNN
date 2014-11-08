<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Candidato $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="candidato-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'id_candidato')->textInput() ?>

    <?=$form->field($model, 'id_usr')->textInput() ?>

    <?=$form->field($model, 'id_puestoEvento')->textInput() ?>

    <?= $form->field($model, 'id_estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
