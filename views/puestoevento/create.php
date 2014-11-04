<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Puesto_Evento $model
 */

$this->title = 'Create Puesto  Evento';
$this->params['breadcrumbs'][] = ['label' => 'Puesto  Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puesto--evento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
