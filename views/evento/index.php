<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\bootstrap\Modal;
//use yii2fullcalendar\CoreAsset;
//use yii\jui\CoreAsset;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\EventoSearch $searchModel
 */

$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* Html::a('Create Evento', ['create'], ['class' => 'btn btn-success']) */?>
    </p>
  
         
    <?php /* GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
                        
            'descripcion',
            //'id_evento',
            ['attribute' => 'fecha','format' => ['date', 'd-m-Y'], ],
            //'fecha',
            'hora',
            'direccion',
            // 'lat',
            // 'long',
            // 'id_ciudad',
            // 'id_deporte',
            // 'id_tipo',
            // 'id_usuario',
           
        ],
    ]); */?>
    
    
    <?= ListView::widget([
    	'dataProvider' => $dataProvider,
        'itemView'=>'_view',
    ]); ?>
 

    
</div>
