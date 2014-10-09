<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\puesto $model
 */

$this->title = 'Update Puesto: ' . $model->id_puesto;
$this->params['breadcrumbs'][] = ['label' => 'Puestos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_puesto, 'url' => ['view', 'id' => $model->id_puesto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="puesto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
