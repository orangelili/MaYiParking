<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ParkingLogs */

$this->title = '预约停车';
$this->params['breadcrumbs'][] = ['label' => 'Parking Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parking-logs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cars' => $cars,
    ]) ?>

</div>
