<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Cars */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'brand',
                'label' => '品牌',
            ],
            [
                'attribute' => 'model',
                'label' => '车型',
            ],
            [
                'attribute' => 'license',
                'label' => '车牌',
            ],
            [
                'attribute' => 'created_at',
                'label' => '创建时间',
                'value' => date('Y-m-d H:i:s', $model->created_at)
            ],
            [
                'attribute' => 'updated_at',
                'label' => '更新时间',
                'value' => date('Y-m-d H:i:s', $model->updated_at)
            ],
        ],
    ]) ?>

</div>
