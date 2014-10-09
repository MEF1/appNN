<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\CandidatoSearch $searchModel
 */

$this->title = 'Candidatos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="candidato-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Candidato', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_candidato',
            'id_usr',
            'id_puestoEvento',
            'id_estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
