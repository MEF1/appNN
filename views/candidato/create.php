<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Candidato $model
 */

$this->title = 'Create Candidato';
$this->params['breadcrumbs'][] = ['label' => 'Candidatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="candidato-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
