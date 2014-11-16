<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Evento $model
 */

$this->title = $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actulizar', ['update', 'id' => $model->id_evento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_evento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

    </p>
    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_evento',
            ['attribute' => 'fecha','format' => ['date', 'd-m-Y'], ],
            ['attribute' => 'hora','format' => ['time', 'H:i'], ],
            //'fecha',
            //'hora',
            'direccion',
            //'descripcion',
            //'lat',
            //'long',
            'idCiudad.nombre',
            'idDeporte.nombre',
            'idTipo.nombre',
            'idUsuario.usr',
        ],
    ]) ?>
    
    

</div>
