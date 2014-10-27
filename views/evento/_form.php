<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;
// use kartik\widgets\Select2;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use app\models\Ciudad;
use app\models\Deporte;

/**
 * @var yii\web\View $this
 * @var app\models\Evento $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="evento-form col-lg-offset-2 col-lg-8">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'id_deporte')->dropDownList(ArrayHelper::map(Deporte::find()->all(),'id_deporte','nombre')) ?>

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
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
