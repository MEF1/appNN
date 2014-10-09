<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Candidato $model
 */

$this->title = 'Update Candidato: ' . $model->id_candidato;
$this->params['breadcrumbs'][] = ['label' => 'Candidatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_candidato, 'url' => ['view', 'id' => $model->id_candidato]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="candidato-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
