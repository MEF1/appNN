<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Tipo_Evento $model
 */

$this->title = 'Create Tipo  Evento';
$this->params['breadcrumbs'][] = ['label' => 'Tipo  Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo--evento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
