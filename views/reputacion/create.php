<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Reputacion $model
 */

$this->title = 'Calificar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reputacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
