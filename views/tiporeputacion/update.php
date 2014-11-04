<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\tipo_reputacion $model
 */

$this->title = 'Update Tipo Reputacion: ' . $model->id_tipo;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Reputacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo, 'url' => ['view', 'id' => $model->id_tipo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-reputacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
