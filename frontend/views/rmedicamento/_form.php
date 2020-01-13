<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReceitaMedicamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receita-medicamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Receita_idReceita')->textInput() ?>

    <?= $form->field($model, 'Medicamento_idMedicamento')->textInput() ?>

    <?= $form->field($model, 'Quantidade')->textInput() ?>

    <?= $form->field($model, 'Dosagem_Diario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
