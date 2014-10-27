<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\FileInput;

/**
 * @var yii\web\View $this
 * @var app\models\Usuario $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="usuario-form col-lg-offset-3 col-lg-8">
	
    <?php $form = ActiveForm::begin([
                'options' => ['enctype'=>'multipart/form-data']
            ]); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 40]) ?>
    <?= $form->field($model, 'apellido')->textInput(['maxlength' => 40]) ?>
    <?= $form->field($model, 'fecha_nac')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Ingrese la fecha de nacimiento ...'],
    'pluginOptions' => [
    'autoclose'=>true,
    'format' => 'yyyy/mm/dd'
    ]
    ]);?>
    <?= $form->field($model, 'sexo')->radioList(["masculino" => "Masculino","femenino" => "Femenino"], $options = ['inline'=>true])?>
    <?= $form->field($model, 'telefono')->textInput() ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => 60]) ?>
    <?= $form->field($model, 'usr')->textInput(['maxlength' => 140]) ?>
    <?= $form->field($model, 'clave')->passwordInput(['maxlength' => 140]) ?>
    <?= $form->field($model, 'foto')->widget(FileInput::classname(), ['options' => ['accept' => 'image/*'],]) ?>
    
    
    
<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
