<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReceitaMedicamento */

$this->title = 'Update Receita Medicamento: ' . $model->Receita_idReceita;
$this->params['breadcrumbs'][] = ['label' => 'Receita Medicamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Receita_idReceita, 'url' => ['view', 'Receita_idReceita' => $model->Receita_idReceita, 'Medicamento_idMedicamento' => $model->Medicamento_idMedicamento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="receita-medicamento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
