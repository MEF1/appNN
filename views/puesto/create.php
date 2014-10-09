<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\puesto $model
 */

$this->title = 'Create Puesto';
$this->params['breadcrumbs'][] = ['label' => 'Puestos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puesto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
