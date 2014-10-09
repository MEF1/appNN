<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\Tipo_EventoSearch $searchModel
 */

$this->title = 'Tipo  Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo--evento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tipo  Evento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tipoEvento',
            'nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
