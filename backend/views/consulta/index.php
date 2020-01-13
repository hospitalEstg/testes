<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consulta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Consulta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

  <?php  foreach($model as $consulta){
            if($consulta->Estado ==0) {
          ?>
                           <table class="table table-striped table-bordered">
                           <tr>
                           <th> Nome Utente </th>
                           <th> Descricao </th>
                           <th> Estado da Consulta </th>
                            <th> Tipo de Consulta </th>
                            <th> Urgente </th>
                            <th> Editar </th>


                           </tr>
                           <tr>
                            <td>
                          <?= $consulta->marcacao->Descricao; ?>
                                   </td>
                           <td>
                           <?= $consulta->Descricao; ?>
                           </td>

                            <td>
                            <?php if($consulta->Estado==0) {
                            echo "Consulta Não Realizada"; }
                             else echo "Consulta Realizada";?>

                            </td>
                             <td>
                              <?= $consulta->TipoConsulta; ?>
                              </td>

                               <td>
                                <?= $consulta->marcacao->Urgente; ?>
                                  </td>




                             <td>
                                    <?= Html::a('Editar', ['update','id' => $consulta->idConsulta], ['class' => 'btn btn-success']) ?>
                                    <?= Html::a('Ver', ['view','id' => $consulta->idConsulta], ['class' => 'btn btn-success']) ?>
                                    <?php   if($consulta->Estado==0)  ?>
                                       <?= Html::a(' Realizar Consulta', ['consulta','id' => $consulta->idConsulta], ['class' => 'btn btn-success'])
                                                                      ?>

                                                       </td>

                           </tr>
                           </table>
                            <?php } }
                            ?>

    <?php /*echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idConsulta',
            'DataConsulta',
            'TipoConsulta',
            'Descricao',
            'Estado',
            //'idMedico',
            //'idFuncionario',
            //'hora',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>


</div>
