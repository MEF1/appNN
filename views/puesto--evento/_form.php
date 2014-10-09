<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Puesto_Evento $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="puesto--evento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_evento')->textInput() ?>

    <?= $form->field($model, 'id_puesto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
