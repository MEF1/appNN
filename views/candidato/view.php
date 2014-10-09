<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Candidato $model
 */

$this->title = $model->id_candidato;
$this->params['breadcrumbs'][] = ['label' => 'Candidatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="candidato-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_candidato], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_candidato], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_candidato',
            'id_usr',
            'id_puestoEvento',
            'id_estado',
        ],
    ]) ?>

</div>
