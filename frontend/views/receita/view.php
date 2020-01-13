<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Receita */

$this->title = $model->idReceita;
$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="receita-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'DataReceita',
            'Prescricao',
        ],
    ]) ?>


</div>
