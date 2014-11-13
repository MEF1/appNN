<?php

use yii\helpers\Html;
use app\models\Puesto_Evento;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
/**
 * @var yii\web\View $this
 * @var app\models\Evento $model
 */
?>
<div class="evento-view">
    <div class="row">
        <div class="col-md-4">
            <?php
                $foto = "imagenes/".$model->idUsuario->foto;
                echo Html::img($foto,['width'=>'150px']); 

            ?>
        </div>
    <div class="col-md-8">
        <p><b><u>Fecha</u></b>: <?= date("d-m-Y",strtotime($model->fecha)); ?> <b><u>Hora</u></b>: <?= date("H:i",strtotime($model->hora)); ?></p>
        <p><b><u>Ciudad</u></b>: <?= $model->idCiudad->nombre; ?></p> 
        <p><b><u>Dirección</u></b>: <?= $model->direccion; ?></p>  
        <p><b><u>Deporte</u></b>: <?= $model->idDeporte->nombre; ?></p>
        <p><b><u>Nombre del Creador</u></b>: <?= Html::a($model->idUsuario->usr, ['usuario/view', 'id' => $model->idUsuario->id_usr]);?></p>   
        <p><b><u>Descripción del Evento</u></b>: <?= $model->descripcion; ?></p>
        </div>
        
    </div>

    <?php
            
            $dataProvider = new ActiveDataProvider([
            'query' => Puesto_Evento::findBySql('select id_puesto from Puesto_Evento where id_evento='.$model->id_evento),
            'pagination' => [
                'pageSize' => 5,
                ],
            ]);
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'columns'=>[
                    'idPuesto.descripcion',
                ]
            ]); 
            
            
    ?>
    
<?= Html::a('Postularme <span class="glyphicon glyphicon-ok"></span>', ['postular', 'id' => $model->id_evento], ['class' => 'btn btn-success']) ?>

</div>