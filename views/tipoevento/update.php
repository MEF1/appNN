<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Tipo_Evento $model
 */

$this->title = 'Update Tipo  Evento: ' . $model->id_tipoEvento;
$this->params['breadcrumbs'][] = ['label' => 'Tipo  Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipoEvento, 'url' => ['view', 'id' => $model->id_tipoEvento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo--evento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
