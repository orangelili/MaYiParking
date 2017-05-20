<?php

use common\models\ParkingLogs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ParkingLogs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parking-logs-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group row">
    <?php if (empty($cars)) :  ?>
        <?= Html::a('请添加您的车辆信息', Url::to('/cars/index'), ['class' => 'btn btn-info'])?>
        <?php else :?>
        <div class="col-md-8">
            <?= $form->field($model, 'car_id')->dropDownList($cars)->label('选择车辆');?>
        </div>
        <div class="col-md-4">
            <label class="control-label"></label>
            <div>
                <?= Html::a('添加新的车辆信息', Url::to('/cars/index'), ['class' => 'btn btn-info'])?>
            </div>
        </div>
    <?php endif;?>
    </div>

    <div class="form-group">
    <?= $form->field($model, 'location_id')->dropDownList(ParkingLogs::$locationMap)->label('选择停车场') ?>
    </div>

    <div class="form-group">
        <?php if (empty($cars)) :  ?>
            <?= Html::button($model->isNewRecord ? '预约' : '修改预约', ['class' => $model->isNewRecord ? 'btn btn-success disabled' : 'btn btn-primary disabled']) ?>
        <?php else :?>
            <?= Html::submitButton($model->isNewRecord ? '预约' : '修改预约', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php endif;?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
