<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\puesto $model
 */

$this->title = $model->id_puesto;
$this->params['breadcrumbs'][] = ['label' => 'Puestos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puesto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_puesto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_puesto], [
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
            'id_puesto',
            'descripcion',
            'id_deporte',
        ],
    ]) ?>

</div>
