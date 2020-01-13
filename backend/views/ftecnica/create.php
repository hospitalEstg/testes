<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FichaTecnica */

$this->title = 'Create Ficha Tecnica';
$this->params['breadcrumbs'][] = ['label' => 'Ficha Tecnicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ficha-tecnica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
