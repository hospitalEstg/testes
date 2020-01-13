<?php

use common\models\Pessoa;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultas';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="consulta-index">
       <div class="col-lg-6" >
              <h2><b>Próximas Consultas</b></h2>
              <br>
              <div style="width: 500px; height: 300px; overflow-y: auto";>
                  <?php  foreach($model as $consulta){
                      if($consulta->Estado == 1) {
                          ?>
                          <table class="table table-bordered">
                              <tr>
                                  <th>Medico: <?= $consulta->idMedico ?></th>
                                  <td>Data: <?= $consulta->DataConsulta ?></td>
                              </tr>
                              <tr>
                                  <td>Descrição: <?= $consulta->Descricao; ?></td>
                                  <td>Hora: <?= $consulta->hora; ?></td>
                              </tr>
                          </table>
                      <?php } }
                  ?>
              </div>
       </div>
    <div class="col-lg-6" >
        <h2><b>Consultas Pendentes de Marcação</b></h2>
        <br>
        <div style="width: 500px; height: 300px; overflow-y: auto";>
            <?php  foreach($model as $consulta){
                if($consulta->Estado ==0) {
                    ?>
                    <table class="table table-bordered">
                        <tr>
                            <td>Data: <?= $consulta->idMedico ?></td>
                            <td>Data: <?= $consulta->DataConsulta ?></td>
                        </tr>
                        <tr>
                            <td>Descrição: <?= $consulta->Descricao; ?></td>
                            <td>Hora: <?= $consulta->hora; ?></td>
                            
                        </tr>
                        <tr>
                            <td></td>
                            <td><?= Html::a('Editar', ['update','id' => $consulta->idConsulta], ['class' => 'btn btn-success']) ?>
                                <?= Html::a('Eliminar', ['delete', 'id' => $consulta->idConsulta], [
                                    'class' => 'btn btn-danger',
                                    'data-confirm' => 'Eliminar?',
                                    'data-method' => 'post',
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
        <?= Html::a('Marcar Consulta', ['consulta/create', 'idMarcacao_Consulta' => $consulta->idConsulta], ['class' => 'btn btn-success']) ?>
    </div>

</div>

