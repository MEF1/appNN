<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Deporte $model
 */

$this->title = 'Create Deporte';
$this->params['breadcrumbs'][] = ['label' => 'Deportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deporte-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
