<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cars */

$this->title = '添加车辆信息';
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
