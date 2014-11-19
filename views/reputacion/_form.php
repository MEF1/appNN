<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\tipo_reputacion;
use kartik\widgets\StarRating;
use app\models\UsuarioSearch;
use app\models\CandidatoSearch;
/**
 * @var yii\web\View $this
 * @var app\models\Reputacion $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="reputacion-form">

    <?php
        $candidato= CandidatoSearch::find($_GET['idCandidato'])->one();
        $usuario=  UsuarioSearch::findOne($candidato->id_usr);    
    ?>
    <div class="row">
               
        <div class="col-md-3">
            <br>
            <?php
                $foto = "imagenes/".$usuario->foto;
                echo Html::img($foto,['width'=>'220px','class'=>'img-thumbnail']);          
            ?>
        </div>
    <div class="col-md-6">
        <h2>Datos del Postulante</h2>
        <h4>Nombre: <?= $usuario->nombre; ?></h4>
        <h4>Apellido: <?= $usuario->apellido; ?></h4>
        <h4>Usuario: <?= $usuario->usr; ?></h4>
        <h4>E-Mail: <?= $usuario->email; ?></h4>
        <h4>Teléfono: <?= $usuario->telefono; ?></h4>
        
        </div>
    </div>
    
    <div class="col-xs-6 col-sm-4">
    <?php $form = ActiveForm::begin(); ?>
    
    <?php //$form->field($model, 'id_tipo')->textInput() ?>
    
    <?= $form->field($model, 'id_tipo')->dropDownList(ArrayHelper::map(tipo_reputacion::find()->all(),'id_tipo','tipo'),['prompt'=>'Seleccionar Tipo'])->label('Tipo Calificacion') ?>
    
    <?= $form->field($model, 'positvo')->widget(StarRating::className(),[
                                        'name' => 'rating',
                                         
                                        'pluginOptions' => ['size' => 'xs','step'=>1]
                                        ])->label('Calificacion'); ?>

    <?php //$form->field($model, 'negativo')->textInput() ?>
    
    <?php //$form->field($model, 'id_usr')->textInput() ?>

    <?php //$form->field($model, 'id_evento')->textInput() ?>
    
    <?= $form->field($model, 'comentario')->textarea(['maxlength' => 140,'rows'=>6]) ?>
        
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>

</div>