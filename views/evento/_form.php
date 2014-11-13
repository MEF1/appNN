<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;
use kartik\widgets\DepDrop;
// use kartik\widgets\Select2;
//use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\Ciudad;
use app\models\Deporte;
use app\models\puesto;


/**
 * @var yii\web\View $this
 * @var app\models\Evento $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="evento-form col-lg-offset-2 col-lg-8">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'id_deporte')->dropDownList(ArrayHelper::map(Deporte::find()->all(),'id_deporte','nombre'),['prompt'=>'Seleccionar Deporte']) ?>
    
    <?php //$form->field($puesto, 'id_puesto')->dropDownList(ArrayHelper::map(puesto::find()->all(),'id_puesto','descripcion'))->label('Puesto') ?>
    <?php //$form->field($puesto, 'id_puesto')->dropDownList(ArrayHelper::map(puesto::findBySql('select id_puesto,descripcion from Puesto where id_deporte=1'.';')->all(),'id_puesto','descripcion'))->label('Puesto') ?>
    
    <?= $form->field($puesto, 'id_puesto')->widget(DepDrop::classname(), [
                'options'=>['id'=>'id_puesto'],
                'pluginOptions'=>[
                'depends'=>[Html::getInputId($model, 'id_deporte')],
                'placeholder'=>'Seleccionar puesto...',
                'url'=>Url::to(['/puesto/json'])
                ]
            ]);  ?>
    
    <?= $form->field($model, 'fecha')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Fecha del evento'],
    'pluginOptions' => [
    'autoclose'=>true,
    'language' => 'es',
    'format' => 'yyyy/mm/dd'
    ]
    ]); ?>
    
    <?= $form->field($model, 'hora')->widget(TimePicker::className())?>

    <?= $form->field($model, 'direccion')->textInput() ?>

    <?= $form->field($model, 'id_ciudad')->dropDownList(ArrayHelper::map(Ciudad::find()->all(),'id_ciudad','nombre')) ?>

    <?php // $form->field($model, 'id_tipo')->textInput($options = ['value'=>'1']) ?>

    <?php // $form->field($model, 'id_usuario')->textInput($options = ['value'=>Yii::$app->user->identity->id]) ?>
    
    <?php // $form->field($model, 'lat')->textInput() ?>

    <?php // $form->field($model, 'long')->textInput() ?>
    
    <?php /* Modal::begin([
    'header' => '<h2>Mapa del lugar</h2>',
    'toggleButton' => ['label' => 'Lugar del evento',
    'class' => 'btn btn-primary',
    ],
    ]);
    echo $this->render('_formMap', [
    'model' => $model,
    ]);

    Modal::end();
     * 
     */
    ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
