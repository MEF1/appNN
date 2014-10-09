<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\CandidatoSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="candidato-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_candidato') ?>

    <?= $form->field($model, 'id_usr') ?>

    <?= $form->field($model, 'id_puestoEvento') ?>

    <?= $form->field($model, 'id_estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
