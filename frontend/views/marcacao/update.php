<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MarcacaoConsulta */

$this->title = 'Update Marcacao Consulta: ' . $model->idMarcacao_Consulta;
$this->params['breadcrumbs'][] = ['label' => 'Marcacao Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idMarcacao_Consulta, 'url' => ['view', 'idMarcacao_Consulta' => $model->idMarcacao_Consulta, 'Pessoa_idPessoa' => $model->Pessoa_idPessoa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="marcacao-consulta-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
