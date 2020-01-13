<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FichaTecnica */

$this->title = $model->idFichaClinica;
$this->params['breadcrumbs'][] = ['label' => 'Ficha Tecnicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ficha-tecnica-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Ficheiro',
            'Observacoes',
        ],
    ]) ?>


</div>
