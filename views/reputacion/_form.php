<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\tipo_reputacion;
use kartik\widgets\StarRating;
/**
 * @var yii\web\View $this
 * @var app\models\Reputacion $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="reputacion-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php //$form->field($model, 'id_tipo')->textInput() ?>
    
    <?= $form->field($model, 'id_tipo')->dropDownList(ArrayHelper::map(tipo_reputacion::find()->all(),'id_tipo','tipo'),['prompt'=>'Seleccionar Tipo'])->label('Tipo Calificacion') ?>
    
    <?= $form->field($model, 'positvo')->widget(StarRating::className(),[
                                        'name' => 'rating',
                                         
                                        'pluginOptions' => ['size' => 'xs']
                                        ])->label('Calificacion'); ?>

    <?php //$form->field($model, 'negativo')->textInput() ?>
    
    <?php //$form->field($model, 'id_usr')->textInput() ?>

    <?php //$form->field($model, 'id_evento')->textInput() ?>
    
    <?= $form->field($model, 'comentario')->textInput(['maxlength' => 140]) ?>
        
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
