<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Consulta */

$this->title = $model->idConsulta;
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="consulta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idConsulta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idConsulta], [
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
            'idConsulta',
            'DataConsulta',
            'TipoConsulta',
            'Descricao',
            'Estado',
            'idMedico',
            'idFuncionario',
            'hora',
        ],
    ]) ?>

    <?= DetailView::widget([
        'model' => $model->marcacao,
        'attributes' => [
            'Descricao',
            'Estado',
            'Pessoa_idPessoa',
            'Urgente',
        ],
    ]) ?>

    <?= DetailView::widget([
        'model' => $model->marcacao->pessoa,
        'attributes' => [
            'Nome',
            'Morada',
            'TipoUtilizador',
        ],
    ]) ?>

</div>
