<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Receita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receita-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idReceita')->textInput() ?>

    <?= $form->field($model, 'DataReceita')->textInput() ?>

    <?= $form->field($model, 'Prescricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Consulta_idConsulta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
