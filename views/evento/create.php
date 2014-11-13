<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Evento $model
 */

$this->title = 'Creacion evento: Me Falta Uno';
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model'=>$model,'puesto'=>$puesto]) ?>

</div>
