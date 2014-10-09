<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\EstadoCandidato $model
 */

$this->title = 'Update Estado Candidato: ' . $model->id_estado;
$this->params['breadcrumbs'][] = ['label' => 'Estado Candidatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_estado, 'url' => ['view', 'id' => $model->id_estado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-candidato-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
