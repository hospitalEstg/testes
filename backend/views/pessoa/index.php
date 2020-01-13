<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Pessoas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pessoa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pessoa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


        <?php foreach($pessoas as $pessoa) { ?>
                           <table class="table table-striped table-bordered">
                           <tr>
                           <th> Nome Utente </th>
                           <th> Data de Nascimento </th>
                           <th> Tipo de Utilizador </th>
                            <th> Opções </th>



                           </tr>
                           <tr>
                            <td>
                          <?= $pessoa->Nome; ?>
                                   </td>
                           <td>
                           <?= $pessoa->DataNascimento; ?>
                           </td>


                             <td>
                              <?= $pessoa->TipoUtilizador; ?>
                              </td>






                             <td>
                                    <?= Html::a('Editar', ['update'], ['class' => 'btn btn-success']) ?>
                                    <?= Html::a('Ver', ['view'], ['class' => 'btn btn-success']) ?>



                                                       </td>

                           </tr>
                           </table>

            <?php } ?>




</div>
