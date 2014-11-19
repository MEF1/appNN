<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\DepDrop;
use yii\helpers\ArrayHelper;
use app\models\Deporte;
use app\models\Ciudad;
/**
 * @var yii\web\View $this
 * @var app\models\EventoSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="evento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class'=>'form-inline'],
    ]); ?>

    <?php // $form->field($model, 'id_evento') ?>

    <?php // $form->field($model, 'descripcion') ?>
    
    <?= $form->field($model, 'fecha')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Fecha'],
    'pluginOptions' => [
    'startDate'=>'-1',
    'autoclose'=>true,
    'language' => 'es',
    'format' => 'yyyy/mm/dd'
    ]
    ]); ?>

    <?php // $form->field($model, 'hora') ?>

    <?php // $form->field($model, 'direccion') ?>
    
    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'long') ?>

    <?php echo $form->field($model, 'id_deporte')->dropDownList(ArrayHelper::map(Deporte::find()->all(),'id_deporte','nombre'),['prompt'=>'Seleccionar Deporte']) ?>
    
    <?php echo $form->field($model, 'id_ciudad')->dropDownList(ArrayHelper::map(Ciudad::find()->all(),'id_ciudad','nombre'),['prompt'=>'Seleccionar Ciudad']) ?>

    <?php // echo $form->field($model, 'id_tipo') ?>

    <?php // echo $form->field($model, 'id_usuario') ?>

    <div class="form-group">
        <span> | </span>
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reiniciar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
