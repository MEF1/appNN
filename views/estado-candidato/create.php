<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\EstadoCandidato $model
 */

$this->title = 'Create Estado Candidato';
$this->params['breadcrumbs'][] = ['label' => 'Estado Candidatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-candidato-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
