<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Consulta */
/* @var $ftec common\models\FichaTecnica */
/* @var $rec common\models\Receita */
/* @var $med common\models\Medicamento */


$this->title = $model->idConsulta;
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<div>
<?php echo "Nome Utente: ". $model->marcacao->pessoa->Nome; ?>

<

<div >

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($ftec, 'Ficheiro')->textInput() ?>

    <?= $form->field($ftec, 'Observacoes')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>




</div>
<div class="receita-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($rec, 'DataReceita')->textInput() ?>

    <?= $form->field($rec, 'Prescricao')->textInput(['maxlength' => true]) ?>





    <?= $form->field($med, 'Nome')->textInput(['maxlength' => true]) ?>


   /* <?= $form->field($model, 'Quantidade')->textInput() ?>

    <?= $form->field($model, 'Dosagem_Diario')->textInput() ?>*/
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
