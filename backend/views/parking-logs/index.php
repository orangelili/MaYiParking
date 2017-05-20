<?php

use common\models\ParkingLogs;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ParkingLogsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parking Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parking-logs-index">

    <h1><?= Html::encode('停车记录') ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => '车型',
                'attribute' => 'car_id',
                'value' => function ($model){
                    return $model->getCar()->getCarInfo();
                },
            ],
            [
                'label' => '停车地点',
                'attribute' => 'location',
            ],
            [
                'label' => '状态',
                'attribute' => 'status',
                'value' => function ($model) {
                    return ParkingLogs::$parkingStateMap[$model->status];
                },
            ],
            [
                'label' => '预约时间',
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return date('m-d H:i:s', $model->created_at);
                },
            ],
            [
                'label' => '更新时间',
                'attribute' => 'updated_at',
                'value' => function ($model) {
                    return date('m-d H:i:s', $model->updated_at);
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {take}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        $options = [
                          'class' => 'btn btn-primary',
                        ];
                        return Html::a('查看详情', $url, $options);
                    },
                    'update' => function ($url, $model, $key) {
                        $options = [
                            'class' => 'btn btn-info',
                        ];
                        if (!$model->isActive()) {
                            $options = [
                                'class' => 'btn btn-info disabled',
                            ];
                            $url = '';
                        }
                        return Html::a('修改预约', $url, $options);
                    },
                    'delete' => function ($url, $model, $key) {
                        $options = [
                            'class' => 'btn btn-danger',
                            'data-method' => 'post'
                        ];
                        if (!$model->isActive()) {
                            $options = [
                                'class' => 'btn btn-danger disabled',
                            ];
                            $url = '';
                        }
                        return Html::a('取消预约', $url, $options);
                    },
                ],
            ]
        ],
    ]); ?>
</div>
