<?php
use common\models\Pessoa;
use dosamigos\datepicker\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Consulta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consulta-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-4">
        <?= $form->field($model, 'DataConsulta')
            ->label('Data da Consulta ')
            ->widget(
                DatePicker::className(), [
                'inline' => true,
                'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);?>
    </div>

    <div class="col-lg-4">
        <?= $form->field($model, 'hora')
            ->label('Hora da Consulta')
            ->widget(
                DateTimePicker::className(), [
                'language' => 'en',
                'size' => 'ms',
                'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'pickButtonIcon' => 'glyphicon glyphicon-time',
                'inline' => true,
                'clientOptions' => [
                    'autoclose' => true,
                    'linkFormat' => 'HH:ii',
                    'todayBtn' => true
                ]
            ]);?>
    </div>

    <div class="col-lg-12">

        <?= $form->field($model, 'TipoConsulta')->dropDownList(
            ['Geral' => 'Consulta Geral',
                'Cardiologia' => 'Cardiologia',
                'Pediatria' => 'Pediatria',
                'Ortopedia' => 'Ortopedia',
                'Psicologia' => 'Psicologia',
                'Urologia' => 'Urologia',
                'Dermatologia' => 'Dermatologia',
                'MedicinaTrabalho' => 'Medicinano trabalho',
                'Oftalmologia' => 'Oftalmologia',
                'Neurologia' => 'Neurologia',
            ]); ?>

        <?= $form->field($model, 'Descricao')->textInput(['maxlength' => true]) ->label('Descrição') ?>

        <?= $form->field($model, 'Estado')->dropDownList(
            ['0' => 'Por marcar'
            ]) ?>

        <?php $medico = ArrayHelper::map(Pessoa::find()->where(['TipoUtilizador' => 'Medico'])->all(),'idPessoa','Nome');
        echo $form->field($model, 'idMedico')->dropDownList($medico) ->label('Nome do Médico') ?>

        <?php $funcionario = ArrayHelper::map(Pessoa::find()->where(['TipoUtilizador' => 'Funcionario'])->all(),'idPessoa','Nome');
        echo $form->field($model, 'idFuncionario')->dropDownList($funcionario) ->label('Nome do Funcionário') ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>

</div>
