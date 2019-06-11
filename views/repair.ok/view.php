<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tbl_repair */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Repairs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-repair-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'BrnStatus',
            'BrnCode',
            'BrnRepair',
            'BrnPos',
            'BrnBrand',
            'BrnModel',
            'BrnSerial',
            'BrnCause',
            'BrnUserCreate',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
