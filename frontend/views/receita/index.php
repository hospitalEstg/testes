<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receita-index">
    <div class="col-lg-12" >
        <h1><b>Receitas Médicas<b></b></h1>
        <?php
        foreach ($model_3 as $pessoa){
            foreach ($model_2 as $consulta){
                foreach ($model_1 as $marcacao){
                    foreach ($model as $receita){
                        if($marcacao->Pessoa_idPessoa == Yii::$app->user->identity->pessoa->idPessoa && $marcacao->Consulta_idConsulta != null && $consulta->idConsulta==$marcacao->Consulta_idConsulta && $consulta->idMedico==$pessoa->idPessoa && $receita->Consulta_idConsulta==$consulta->idConsulta) {?>
                            <br>
                            <br>
                            <table class="table table-striped">
                                <tr>
                                    <th>Medico: <?= $pessoa->Nome ?></th>
                                    <td>Data: <?= $consulta->DataConsulta ?></td>
                                </tr>
                                <tr class="table-warning">
                                    <td>Prescrição: <?= $receita->Prescricao; ?></td>
                                    <td>Hora: <?= $consulta->hora; ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><?= Html::a('Ver detalhes', ['view', 'id' => $receita->idReceita], ['class' => 'btn btn-primary']) ?></td>
                                </tr>
                            </table>
                            <br>
                        <?php } } } } }
        ?>
    </div>
</div>
