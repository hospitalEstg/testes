<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MarcacaoConsulta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="marcacao-consulta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Pessoa_idPessoa')->textInput() ?>

    <?= $form->field($model, 'Consulta_idConsulta')->textInput() ?>

    <?= $form->field($model, 'Estado')->textInput() ?>

    <?= $form->field($model, 'Descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Urgente')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
