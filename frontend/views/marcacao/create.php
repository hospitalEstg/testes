<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MarcacaoConsulta */

$this->title = 'Create Marcacao Consulta';
$this->params['breadcrumbs'][] = ['label' => 'Marcacao Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marcacao-consulta-create">

    <h1><b>Marcação de Consulta<b></b></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
