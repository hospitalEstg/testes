<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receita Medicamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receita-medicamento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Receita Medicamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Receita_idReceita',
            'Medicamento_idMedicamento',
            'Quantidade',
            'Dosagem_Diario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
