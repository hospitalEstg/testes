<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ReceitaMedicamento */

$this->title = $model->Receita_idReceita;
$this->params['breadcrumbs'][] = ['label' => 'Receita Medicamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="receita-medicamento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Receita_idReceita' => $model->Receita_idReceita, 'Medicamento_idMedicamento' => $model->Medicamento_idMedicamento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Receita_idReceita' => $model->Receita_idReceita, 'Medicamento_idMedicamento' => $model->Medicamento_idMedicamento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Receita_idReceita',
            'Medicamento_idMedicamento',
            'Quantidade',
            'Dosagem_Diario',
        ],
    ]) ?>

</div>
