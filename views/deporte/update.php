<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Deporte $model
 */

$this->title = 'Update Deporte: ' . $model->id_deporte;
$this->params['breadcrumbs'][] = ['label' => 'Deportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_deporte, 'url' => ['view', 'id' => $model->id_deporte]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="deporte-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
