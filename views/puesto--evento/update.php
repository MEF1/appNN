<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Puesto_Evento $model
 */

$this->title = 'Update Puesto  Evento: ' . $model->id_puestoEvento;
$this->params['breadcrumbs'][] = ['label' => 'Puesto  Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_puestoEvento, 'url' => ['view', 'id' => $model->id_puestoEvento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="puesto--evento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
