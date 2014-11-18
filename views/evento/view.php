<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Evento $model
 */

$this->title = 'MEFU';
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-view">
    <h1 style="color: #00BC8C; text-decoration: underline;">¡¡Felicitaciones, tu evento fue creado correctamente!!</h1>
    <div class="col-xs-9">
        <p style="font-size: 21pt;"><u>Evento</u>: <?= $model->descripcion; ?></p>
        <p style="font-size: 21pt;"><u>Fecha</u>:  <?= $model->fecha; ?></p>
        <p style="font-size: 21pt;"><u>Hora</u>:  <?= $model->hora; ?></p>
        <p style="font-size: 21pt;"><u>Dirección</u>:  <?= $model->direccion; ?></p>
        <p style="font-size: 21pt;"><u>Ciudad</u>: <?= $model->idCiudad->nombre; ?></p>
        <p style="font-size: 21pt;"><u>Deporte</u>: <?= $model->idDeporte->nombre; ?></p>
        
    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id_evento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_evento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estás seguro que queres borrarlo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    </div>
</div>
