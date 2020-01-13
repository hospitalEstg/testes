<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Consulta */


$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];

?>
<div class="consulta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
