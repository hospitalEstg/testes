<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pessoa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pessoa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DataNascimento')->textInput() ?>

    <?= $form->field($model, 'Morada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NumUtenteSaude')->textInput() ->label('Número de Utente') ?>

    <?= $form->field($model, 'NumIDCivil')->textInput() ->label('Número de Identificação Civil') ?>

    <?= $form->field($model, 'TipoUtilizador')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'idUser')->hiddenInput(['value'=>Yii::$app->user->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
