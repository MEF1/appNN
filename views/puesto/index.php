<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\PuestoSearch $searchModel
 */

$this->title = 'Puestos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puesto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Puesto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_puesto',
            'descripcion',
            'id_deporte',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
