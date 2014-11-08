<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use app\models\Evento;
use app\models\Puesto_Evento;
use app\models\Candidato;
//use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

/**
 * @var yii\web\View $this
 * @var app\models\Usuario $model
 */

$this->title ='Usuario: '.$model->usr;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_usr], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_usr], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
               
        <div class="col-md-3">
            <br>
            <?php
                $foto = "imagenes/".$model->foto;
                echo Html::img($foto,['width'=>'220px','class'=>'img-thumbnail']);          
            ?>
        </div>
    <div class="col-md-6">
        <h2>Datos Personales</h2>
        <h4>Nombre: <?= $model->nombre; ?></h4>
        <h4>Apellido: <?= $model->apellido; ?></h4>
        <h4>Fecha de Nacimiento: <?= $model->fecha_nac; ?></h4>
        <h4>Sexo: <?= $model->sexo; ?></h4>
        <h4>E-Mail: <?= $model->email; ?></h4>
        <h4>Teléfono: <?= $model->telefono; ?></h4>
        
        </div>
    </div>
    <h2>Mis Eventos</h2>
    <?php
            
            $dataProvider = new ActiveDataProvider([
            'query' => Evento::findBySql('select * from Evento where id_usuario='.$model->id_usr),
            'pagination' => [
                'pageSize' => 5,
                ],
            ]);
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'columns'=>[
                    'idDeporte.nombre',
                    'descripcion',
                    'fecha',
                    'hora',                    
                    'idCiudad.nombre',

                    
                    
                ]
            ]); 
            
            
    ?>
    <h2>Postulantes</h2>
    <?php
            $eventos=Evento::findBySql('select * from Evento where id_usuario='.$model->id_usr)->all();
            
            foreach ($eventos as $evento) {
            
                $puestoEvento=Puesto_Evento::findBySql('select * from Puesto_Evento where id_evento='.$evento->id_evento)->one();


                $dataProvider1 = new ActiveDataProvider([
                'query' => Candidato::findBySql('select * from Candidato where id_puestoEvento='.$puestoEvento->id_puestoEvento),
                'pagination' => [
                    'pageSize' => 5,
                    ],
                ]);
                echo GridView::widget([
                    'dataProvider' => $dataProvider1,
                    'columns'=>[
                        //'id_candidato',
                        'idPuestoEvento.idEvento.descripcion',
                        'idPuestoEvento.idPuesto.descripcion',
                        'idUsr.nombre',
                        'idEstado.tipo',


                    ]
                ]); 
            }
            
    ?>
    
    <h2>Me postule en -- Eventos: </h2>
    <?php            
            $dataProvider2 = new ActiveDataProvider([
            'query' => Candidato::findBySql('select * from Candidato where id_usr='.Yii::$app->user->identity->id),
            'pagination' => [
                'pageSize' => 10,
                ],
            ]);
            echo GridView::widget([
                'dataProvider' => $dataProvider2,
                'columns'=>[
                    //'id_candidato',
                    'idPuestoEvento.idEvento.descripcion',
                    'idPuestoEvento.idPuesto.descripcion',
                    //'idUsr.nombre',
                    'idEstado.tipo',


                ]
            ]); 

            
    ?>
    

</div>