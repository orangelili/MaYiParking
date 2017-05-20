<?php

use common\models\ParkingLogs;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ParkingLogs */

$this->title = '停车记录';
$this->params['breadcrumbs'][] = ['label' => 'Parking Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parking-logs-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if ($model->isActive()) :  ?>
            <?= Html::a('修改预约', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('取消预约', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '你确定要取消预约吗?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('入库', ['parking', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?php endif;?>
        <?php if ($model->canTake()) :  ?>
            <?= Html::a('取车', ['take', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
        <?php endif;?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'car_id',
                'label' => '车辆信息',
                'value' => $model->getCar()->getCarInfo(),
            ],
            [
                'attribute' => 'location',
                'label' => '停车地点',
            ],
            [
                'attribute' => 'status',
                'label' => '记录状态',
                'value' => ParkingLogs::$parkingStateMap[$model->status]
            ],
            [
                'attribute' => 'created_at',
                'label' => '预约时间',
                'value' => date('Y-m-d H:i:s', $model->created_at)
            ],
            [
                'attribute' => 'updated_at',
                'label' => '记录更新时间',
                'value' => date('Y-m-d H:i:s', $model->updated_at)
            ],
            [
                'attribute' => 'money',
                'label' => '已结算',
                'value' => number_format($model->money, 2)
            ],
        ],
    ]) ?>

</div>
