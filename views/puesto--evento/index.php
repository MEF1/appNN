<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\Puesto_EventoSearch $searchModel
 */

$this->title = 'Puesto  Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puesto--evento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Puesto  Evento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_puestoEvento',
            'id_evento',
            'id_puesto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
