<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Evento $model
 */

$this->title = 'Modificar Evento: ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_evento, 'url' => ['view', 'id' => $model->id_evento]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="evento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'puesto'=>$puesto,
    ]) ?>

</div>
