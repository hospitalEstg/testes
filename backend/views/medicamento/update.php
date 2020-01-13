<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Medicamento */

$this->title = 'Update Medicamento: ' . $model->idMedicamento;
$this->params['breadcrumbs'][] = ['label' => 'Medicamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idMedicamento, 'url' => ['view', 'id' => $model->idMedicamento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="medicamento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
