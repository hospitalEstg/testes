<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Receita */

$this->title = 'Update Receita: ' . $model->idReceita;
$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idReceita, 'url' => ['view', 'id' => $model->idReceita]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="receita-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
