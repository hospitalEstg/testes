<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MarcacaoConsulta */

$this->title = 'Atualizar';
$this->params['breadcrumbs'][] = ['label' => 'Marcacao Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="marcacao-consulta-view">

    <p>
        <?= Html::a('Update', ['update', 'idMarcacao_Consulta' => $model->idMarcacao_Consulta, 'Pessoa_idPessoa' => $model->Pessoa_idPessoa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idMarcacao_Consulta' => $model->idMarcacao_Consulta, 'Pessoa_idPessoa' => $model->Pessoa_idPessoa], [
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
            'Descricao',
        ],
    ]) ?>


</div>
