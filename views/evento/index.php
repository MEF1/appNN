<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Evento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_evento',
            'fecha',
            'hora',
            'direccion',
            'descripcion',
            // 'lat',
            // 'long',
            // 'id_ciudad',
            // 'id_deporte',
            // 'id_tipo',
            // 'id_usuario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
