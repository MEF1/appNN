<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Reputacion $model
 */

$this->title = $model->id_reputacion;
$this->params['breadcrumbs'][] = ['label' => 'Reputacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reputacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php Html::a('Update', ['update', 'id' => $model->id_reputacion], ['class' => 'btn btn-primary']) ?>
        <?php Html::a('Delete', ['delete', 'id' => $model->id_reputacion], [
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
            //'id_reputacion',            
            'idEvento.descripcion',
            'idTipo.tipo',
            'comentario',
            'positvo',
            'negativo',
            'idUsr.usr',
        ],
    ]) ?>

</div>
