<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FichaTecnica */

$this->title = 'Update Ficha Tecnica: ' . $model->idFichaClinica;
$this->params['breadcrumbs'][] = ['label' => 'Ficha Tecnicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idFichaClinica, 'url' => ['view', 'id' => $model->idFichaClinica]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ficha-tecnica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
