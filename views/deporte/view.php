<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Deporte $model
 */

$this->title = $model->id_deporte;
$this->params['breadcrumbs'][] = ['label' => 'Deportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deporte-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_deporte], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_deporte], [
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
            'id_deporte',
            'nombre',
        ],
    ]) ?>

</div>
