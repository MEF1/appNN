<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\EstadoCandidato;
use app\models\Usuario;
use kartik\widgets\StarRating;

/**
 * @var yii\web\View $this
 * @var app\models\Candidato $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="row">
    
    <div class="col-md-3">
        <?php 
            $usr= Usuario::findOne($model->id_usr);

            $foto = "imagenes/".$usr->foto;
            echo Html::img($foto,['width'=>'220px','class'=>'img-thumbnail']);
        ?>
    </div>
    <div class="col-md-6">
        <?php    
        echo '<br>Nombre Usuario: '.$usr->usr;
        echo '<br>Sexo: '.$usr->sexo;
        echo '<br>Fecha Nacimiento: '.$usr->fecha_nac;
        echo '<br>Telefono: '.$usr->telefono;       
        echo '<br>Mail: '.$usr->email;
        
        
        echo StarRating::widget([
        'name' => 'rating',
        'value'=>'2',
        'pluginOptions' => ['size' => 'xs','disabled'=>'false','data-show-clear'=>'false' ,'data-show-caption'=>'true']
        ]);
        
        
        ?>
        
    </div>
    
    
</div>


<div class="candidato-form col-md-3">

    <?php $form = ActiveForm::begin(); ?>

    <?php $form->field($model, 'id_candidato')->textInput() ?>

    <?php $form->field($model, 'id_usr')->textInput() ?>

    <?php $form->field($model, 'id_puestoEvento')->textInput() ?>

    <?php //$form->field($model, 'id_estado')->textInput() ?>
    
    <?= $form->field($model, 'id_estado')->dropDownList(ArrayHelper::map(EstadoCandidato::find()->all(),'id_estado','tipo'),['prompt'=>'Seleccionar Estado Candidato'])->label('Estado del Cadidato') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
