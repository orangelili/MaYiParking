<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ParkingLogs */

$this->title = '停车记录';
$this->params['breadcrumbs'][] = ['label' => 'Parking Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parking-logs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cars' => $cars,
    ]) ?>

</div>
