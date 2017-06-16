<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CarsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '车辆信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加车辆信息', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => '品牌',
                'attribute' => 'brand',
            ],
            [
                'label' => '车型',
                'attribute' => 'model',
            ],
            [
                'label' => '车牌',
                'attribute' => 'license',
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        $options = [
                            'class' => 'btn btn-primary',
                        ];
                        return Html::a('查看', $url, $options);
                    },
                    'update' => function ($url, $model, $key) {
                        $options = [
                            'class' => 'btn btn-info',
                        ];
                        return Html::a('修改', $url, $options);
                    },
                    'delete' => function ($url, $model, $key) {
                        $options = [
                            'class' => 'btn btn-danger',
                            'data-method' => 'post'
                        ];
                        return Html::a('删除', $url, $options);
                    },
                ],
            ]
        ],
    ]); ?>
</div>
