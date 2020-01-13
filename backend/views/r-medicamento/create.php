<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReceitaMedicamento */

$this->title = 'Create Receita Medicamento';
$this->params['breadcrumbs'][] = ['label' => 'Receita Medicamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receita-medicamento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
