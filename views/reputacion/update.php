<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Reputacion $model
 */

$this->title = 'Update Reputacion: ' . $model->id_reputacion;
$this->params['breadcrumbs'][] = ['label' => 'Reputacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_reputacion, 'url' => ['view', 'id' => $model->id_reputacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reputacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
