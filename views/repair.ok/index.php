<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\tbl_repair_search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Repairs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-repair-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Repair', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'BrnStatus',
            'BrnCode',
            'BrnRepair',
            'BrnPos',
            //'BrnBrand',
            //'BrnModel',
            //'BrnSerial',
            //'BrnCause',
            //'BrnUserCreate',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
