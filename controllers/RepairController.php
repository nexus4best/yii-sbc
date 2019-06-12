<?php

namespace app\controllers;

use Yii;
use app\models\tbl_repair;
use app\models\tbl_repair_search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;

class RepairController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /* ตรวจสอบลงชื่อเข้าใช้ระบบ */
    public function init()
    {
        $session = Yii::$app->session;
        if(empty($session->get('UserBranch'))) {
            $this->redirect('/login/logout');
        }
    }

    /* หน้าแรก แสดงรายการแจ้งซ่อม */
    public function actionIndex()
    {
        $this->layout = 'mainRepair';
        $model = tbl_repair::getAll();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
        $this->layout = 'mainRepair';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /* เลือกรายการแจ้งซ่อม */
    public function actionChoice()
    {
        $this->layout = 'mainRepair';
        if(Yii::$app->request->post()) {
            if (empty($_POST['brn_repair'])) {
                \Yii::$app->getSession()->setFlash('repairError', 'โปรดเลือกรายการแจ้งซ่อม');
                return $this->render('_form_choice');
            } elseif ($_POST['brn_repair'] == 'computer') {
                return $this->redirect(array('computer'));
            }
        } else {
            return $this->render('_form_choice');
        }
    }

    public function actionComputer()
    {
        $this->layout = 'mainRepair';
        $model = new tbl_repair();
        $model->scenario = 'computer';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnUserCreate = Yii::$app->session->get('UserName');
            $model->BrnRepair = "คอมพิวเตอร์";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }

            $model->save();
            
            return $this->redirect('index');
        } else {
            return $this->render('computer', [
                'model' => $model,
                'title' => 'คอมพิวเตอร์'
            ]);
        }
                    
    }



    public function actionCreate()
    {
        $model = new tbl_repair();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = tbl_repair::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
