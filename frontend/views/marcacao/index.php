<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Marcacao Consultas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marcacao-consulta-index">

    <div class="col-lg-6" > <!--                                                                        Lado direito -->
        <h2><b>Próximas Consultas</b></h2>
        <br>
        <div style="width: 500px; height: 300px; overflow-y: auto";>
            <?php
            foreach ($model_2 as $pessoa){
                foreach ($model_1 as $consulta){
                    foreach($model as $marcacao){
                        if($marcacao->Pessoa_idPessoa == Yii::$app->user->identity->pessoa->idPessoa && $marcacao->Consulta_idConsulta != null && $consulta->idConsulta==$marcacao->Consulta_idConsulta && $consulta->idMedico==$pessoa->idPessoa) {?>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Medico: <?= $pessoa->Nome ?></th>
                                    <td>Data: <?= $consulta->DataConsulta ?></td>
                                </tr>
                                <tr>
                                    <td>Descrição: <?= $marcacao->Descricao; ?></td>
                                    <td>Hora: <?= $consulta->hora; ?></td>
                                </tr>
                            </table>
                        <?php } } } }
                ?>
        </div>
    </div>


    <div class="col-lg-6" > <!--                                                                       Lado esquerdo -->
        <h2><b>Consultas Pendentes de Marcação</b></h2>
        <br>
        <div style="width: 500px; height: 300px; overflow-y: auto";>
            <?php  foreach($model as $marcacao){
                if($marcacao->Pessoa_idPessoa == Yii::$app->user->identity->pessoa->idPessoa && $marcacao->Consulta_idConsulta == null ) {
                    ?>
                    <table class="table table-bordered">
                        <tr>
                            <td>Estado: <?php if ( $marcacao->Estado == 0){echo 'A aguardar marcação ...';} else echo 'Marcação concluida '; ?></td>
                        </tr>
                        <tr>
                            <td>Descrição: <?= $marcacao->Descricao; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <?= Html::a('Update', ['update', 'idMarcacao_Consulta' => $marcacao->idMarcacao_Consulta, 'Pessoa_idPessoa' => $marcacao->Pessoa_idPessoa], ['class' => 'btn btn-primary']) ?>
                                <?= Html::a('Delete', ['delete', 'idMarcacao_Consulta' => $marcacao->idMarcacao_Consulta, 'Pessoa_idPessoa' => $marcacao->Pessoa_idPessoa], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </td>
                        </tr>
                    </table>
                <?php } }
            ?>
        </div>
    </div>
    <div class="col-lg-12"><hr></div>
    <div class="col-lg-6" >
    </div>
    <div class="col-lg-6" >

        <br>
        <?= Html::a('Marcar Consulta', ['marcacao/create'], ['class' => 'btn btn-success']) ?>
    </div>
</div>
