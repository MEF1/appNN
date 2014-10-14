<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/**
 * @var yii\web\View $this
 * @var app\models\Evento $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="evento-form col-lg-offset-2 col-lg-8">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Fecha del evento'],
    'pluginOptions' => [
    'autoclose'=>true,
    'format' => 'yyyy/mm/dd'
    ]
    ]); ?>

    <?= $form->field($model, 'hora')->widget(kartik\widgets\TimePicker::className())?>

    <?= $form->field($model, 'direccion')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'long')->textInput() ?>

    <?= $form->field($model, 'id_ciudad')->textInput() ?>

    <?= $form->field($model, 'id_deporte')->textInput() ?>

    <?= $form->field($model, 'id_tipo')->textInput() ?>

    <?= $form->field($model, 'id_usuario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
