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
            } elseif ($_POST['brn_repair'] == 'harddisk') {
                return $this->redirect(array('harddisk'));
            } elseif ($_POST['brn_repair'] == 'bios') {
                return $this->redirect(array('bios'));
            } elseif ($_POST['brn_repair'] == 'ups') {
                return $this->redirect(array('ups'));
            } elseif ($_POST['brn_repair'] == 'tm') {
                return $this->redirect(array('tm'));
            } elseif ($_POST['brn_repair'] == 'magnetic') {
                return $this->redirect(array('magnetic'));
            } elseif ($_POST['brn_repair'] == 'scanner') {
                return $this->redirect(array('scanner'));
            } elseif ($_POST['brn_repair'] == 'cashdrawer') {
                return $this->redirect(array('cashdrawer'));
            } elseif ($_POST['brn_repair'] == 'cashbank') {
                return $this->redirect(array('cashbank'));
            } elseif ($_POST['brn_repair'] == 'monitor') {
                return $this->redirect(array('monitor'));
            } elseif ($_POST['brn_repair'] == 'keyboard') {
                return $this->redirect(array('keyboard'));
            } elseif ($_POST['brn_repair'] == 'mouse') {
                return $this->redirect(array('mouse'));
            } elseif ($_POST['brn_repair'] == 'powerstrip') {
                return $this->redirect(array('powerstrip'));
            } elseif ($_POST['brn_repair'] == 'router') {
                return $this->redirect(array('router'));
            } elseif ($_POST['brn_repair'] == 'voice') {
                return $this->redirect(array('voice'));
            } elseif ($_POST['brn_repair'] == 'switch') {
                return $this->redirect(array('switch'));
            } elseif ($_POST['brn_repair'] == 'other') {
                return $this->redirect(array('other'));
            }
        } else {
            return $this->render('_form_choice');
        }
    }

    public function actionOther()
    {
        $this->layout = 'mainRepair';
        $model = new tbl_repair();
        $model->scenario = 'other';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnUserCreate = Yii::$app->session->get('UserName');
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }

            $model->save();
            
            return $this->redirect('index');
        } else {
            return $this->render('other', [
                'model' => $model,
                'title' => 'รายการอื่นๆ'
            ]);
        }
                    
    }

    public function actionSwitch()
    {
        $this->layout = 'mainRepair';
        $model = new tbl_repair();
        $model->scenario = 'switch';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnUserCreate = Yii::$app->session->get('UserName');
            $model->BrnRepair = "Switch";
            $model->BrnStatus = "แจ้งซ่อม";
            $model->BrnPos = 'ADSL';

            $model->save();
            
            return $this->redirect('index');
        } else {
            return $this->render('switch', [
                'model' => $model,
                'title' => 'Switch'
            ]);
        }
                    
    }

    public function actionVoice()
    {
        $this->layout = 'mainRepair';
        $model = new tbl_repair();
        $model->scenario = 'voice';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnUserCreate = Yii::$app->session->get('UserName');
            $model->BrnRepair = "Voice";
            $model->BrnStatus = "แจ้งซ่อม";
            $model->BrnPos = 'ADSL';

            $model->save();
            
            return $this->redirect('index');
        } else {
            return $this->render('voice', [
                'model' => $model,
                'title' => 'Voice'
            ]);
        }
                    
    }

    public function actionRouter()
    {
        $this->layout = 'mainRepair';
        $model = new tbl_repair();
        $model->scenario = 'router';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnUserCreate = Yii::$app->session->get('UserName');
            $model->BrnRepair = "Router";
            $model->BrnStatus = "แจ้งซ่อม";
            $model->BrnPos = 'ADSL';

            $model->save();
            
            return $this->redirect('index');
        } else {
            return $this->render('router', [
                'model' => $model,
                'title' => 'Router'
            ]);
        }
                    
    }

    public function actionPowerstrip()
    {
        $this->layout = 'mainRepair';
        $model = new tbl_repair();
        $model->scenario = 'powerstrip';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnUserCreate = Yii::$app->session->get('UserName');
            $model->BrnRepair = "รางปลั๊กไฟ";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }

            $model->save();
            
            return $this->redirect('index');
        } else {
            return $this->render('powerstrip', [
                'model' => $model,
                'title' => 'รางปลั๊กไฟ'
            ]);
        }
                    
    }

    public function actionMouse()
    {
        $this->layout = 'mainRepair';
        $model = new tbl_repair();
        $model->scenario = 'mouse';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnUserCreate = Yii::$app->session->get('UserName');
            $model->BrnRepair = "เมาส์";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }

            $model->save();
            
            return $this->redirect('index');
        } else {
            return $this->render('mouse', [
                'model' => $model,
                'title' => 'เมาส์'
            ]);
        }
                    
    }

    public function actionKeyboard()
    {
        $this->layout = 'mainRepair';
        $model = new tbl_repair();
        $model->scenario = 'keyboard';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnUserCreate = Yii::$app->session->get('UserName');
            $model->BrnRepair = "คีย์บอร์ด";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }

            $model->save();
            
            return $this->redirect('index');
        } else {
            return $this->render('keyboard', [
                'model' => $model,
                'title' => 'คีย์บอร์ด'
            ]);
        }
                    
    }

    public function actionMonitor()
    {
        $this->layout = 'mainRepair';
        $model = new tbl_repair();
        $model->scenario = 'monitor';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnUserCreate = Yii::$app->session->get('UserName');
            $model->BrnRepair = "จอภาพ";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }

            $model->save();
            
            return $this->redirect('index');
        } else {
            return $this->render('monitor', [
                'model' => $model,
                'title' => 'จอภาพ'
            ]);
        }
                    
    }

    public function actionCashbank()
    {
        $this->layout = 'mainRepair';
        $model = new tbl_repair();
        $model->scenario = 'cashbank';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnUserCreate = Yii::$app->session->get('UserName');
            $model->BrnRepair = "ที่หนีบธนบัตร";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }

            $model->save();
            
            return $this->redirect('index');
        } else {
            return $this->render('cashbank', [
                'model' => $model,
                'title' => 'ที่หนีบธนบัตร'
            ]);
        }
                    
    }

    public function actionCashdrawer()
    {
        $this->layout = 'mainRepair';
        $model = new tbl_repair();
        $model->scenario = 'cashdrawer';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnUserCreate = Yii::$app->session->get('UserName');
            $model->BrnRepair = "ลิ้นชักเงินสด";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }

            $model->save();
            
            return $this->redirect('index');
        } else {
            return $this->render('cashdrawer', [
                'model' => $model,
                'title' => 'ลิ้นชักเงินสด'
            ]);
        }
                    
    }

    public function actionScanner()
    {
        $this->layout = 'mainRepair';
        $model = new tbl_repair();
        $model->scenario = 'scanner';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnUserCreate = Yii::$app->session->get('UserName');
            $model->BrnRepair = "สแกนเนอร์";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }

            $model->save();
            
            return $this->redirect('index');
        } else {
            return $this->render('scanner', [
                'model' => $model,
                'title' => 'สแกนเนอร์'
            ]);
        }
                    
    }

    public function actionMagnetic()
    {
        $this->layout = 'mainRepair';
        $model = new tbl_repair();
        $model->scenario = 'magnetic';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnUserCreate = Yii::$app->session->get('UserName');
            $model->BrnRepair = "เครื่องรูดบัตร";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }

            $model->save();
            
            return $this->redirect('index');
        } else {
            return $this->render('magnetic', [
                'model' => $model,
                'title' => 'เครื่องรูดบัตร'
            ]);
        }
                    
    }

    public function actionTm()
    {
        $this->layout = 'mainRepair';
        $model = new tbl_repair();
        $model->scenario = 'tm';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnUserCreate = Yii::$app->session->get('UserName');
            $model->BrnRepair = "เครื่องพิมพ์ใบเสร็จ";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }

            $model->save();
            
            return $this->redirect('index');
        } else {
            return $this->render('tm', [
                'model' => $model,
                'title' => 'เครื่องพิมพ์ใบเสร็จ'
            ]);
        }
                    
    }

    public function actionUps()
    {
        $this->layout = 'mainRepair';
        $model = new tbl_repair();
        $model->scenario = 'ups';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnUserCreate = Yii::$app->session->get('UserName');
            $model->BrnRepair = "เครื่องสำรองไฟ";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }

            $model->save();
            
            return $this->redirect('index');
        } else {
            return $this->render('ups', [
                'model' => $model,
                'title' => 'เครื่องสำรองไฟ'
            ]);
        }
                    
    }

    public function actionBios()
    {
        $this->layout = 'mainRepair';
        $model = new tbl_repair();
        $model->scenario = 'bios';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnUserCreate = Yii::$app->session->get('UserName');
            $model->BrnRepair = "แบตเตอรี่ เมนบอร์ด";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }

            $model->save();
            
            return $this->redirect('index');
        } else {
            return $this->render('bios', [
                'model' => $model,
                'title' => 'แบตเตอรี่ เมนบอร์ด'
            ]);
        }
                    
    }

    public function actionHarddisk()
    {
        $this->layout = 'mainRepair';
        $model = new tbl_repair();
        $model->scenario = 'harddisk';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnUserCreate = Yii::$app->session->get('UserName');
            $model->BrnRepair = "ฮาร์ดดิสก์";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }

            $model->save();
            
            return $this->redirect('index');
        } else {
            return $this->render('harddisk', [
                'model' => $model,
                'title' => 'ฮาร์ดดิสก์'
            ]);
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
