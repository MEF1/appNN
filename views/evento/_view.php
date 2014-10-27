<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var app\models\Evento $model
 */

//$this->title = $model->id_evento;
//$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-view">

    <h1><?php // Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_evento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cerrar Evento', ['delete', 'id' => $model->id_evento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Postularse', ['_formPostularse', 'id' => $model->id_evento], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'descripcion',            
            //'id_evento',
            'fecha',
            'hora',
            'direccion',
            //'lat',
            //'long',
            'idCiudad.nombre',
            'idDeporte.nombre',
            //'id_tipo',
            //'id_usuario',
            'idUsuario.usr',
            
        ],
    ]) ?>
    
    <?php // $model->idUsuario->usr ?>
    


</div>
