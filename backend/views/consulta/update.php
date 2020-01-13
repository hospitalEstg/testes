<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Consulta */

$this->title = 'Update Consulta: ' . $model->idConsulta;
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idConsulta, 'url' => ['view', 'id' => $model->idConsulta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="consulta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
