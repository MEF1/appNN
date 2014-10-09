<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\tipo_reputacion $model
 */

$this->title = 'Create Tipo Reputacion';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Reputacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-reputacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
