<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pessoa */

\yii\web\YiiAsset::register($this);
?>
<div class="pessoa-view">
    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->idPessoa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idPessoa], [
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
            'Nome',
            'DataNascimento',
            'Morada',
            'NumUtenteSaude',
            'NumIDCivil',
        ],

    ]) ?>

    <a href="/site/request-password-reset"><p>Alterar Password</p></a>

</div>
