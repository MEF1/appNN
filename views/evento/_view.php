<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;

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
        <?php Html::a('Actualizar', ['update', 'id' => $model->id_evento], ['class' => 'btn btn-primary']) ?>
        <?php Html::a('Cerrar Evento', ['delete', 'id' => $model->id_evento], [
            'class' => 'btn btn-danger',
            'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
            ],
        ]) ?>
    </p>

<div class="evento-view">
    <div class="row">        
        <div class="table-responsive col-md-9 col-md-offset-2">
            <table class="table">
                <tr>
                    <td class="active"><?php  $foto = "imagenes/".$model->idUsuario->foto; echo Html::img($foto,['width'=>'50px','class'=>'img-thumbnail']);?> </td>
                    <td class="active"><?= $model->descripcion; ?></td>
                    <td class="active"><b>Fecha</b>: <?= $model->fecha; ?> <br><b>Hora</b>: <?= $model->hora; ?></td>
                    <td class="success">
                        <?php Modal::begin([
                            'toggleButton' => ['label' => 'Quiero ir',
                            'class' => 'btn btn-success',],]);
                            echo $this->render('viewPostular', [
                            'model' => $model,
                            ]);

                            Modal::end();
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>