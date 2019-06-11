<?php

namespace app\controllers;

use Yii;
use yii\web\Session;
use yii\db\mssql\PDO;

class LoginController extends \yii\web\Controller
{
    /* ลงชื่อเข้าใช้ระบบ */
    public function actionIndex()
    {
        $this->layout = 'mainLogin';

        if(!empty($_POST['UserID']) && !empty($_POST['UserPassword'])) {

            $user = $_POST['UserID'];
            $pass = $_POST['UserPassword'];

            /* ติดต่อ SQL2000 */
            try {
                $hostname = "10.19.19.50";
                $port = 1433;
                $dbname = "Office";
                $username = "sa";
                $pw = "w,jgvkojk";
                $dbh = new PDO("dblib:host=$hostname:$port;dbname=$dbname","$username","$pw");
            } catch (PDOException $e) {
                echo "Failed to get Server: ".$e->getMessage()."\n";
                exit;
            }

            $query = $dbh->prepare("
                SELECT 
                    UserID,UserPassword,UserName,UserBranch
                FROM
                    T_AllUser
                WHERE
                    UserID='$user'
                AND
                    UserPassword='$pass'
            ");

            $query->execute();
            
            while($row = $query->fetch()) {
                $UserID = $row['UserID'];
                $UserName = $row['UserName'];
                $UserBranch = $row['UserBranch'];
            }

            
            if(!empty($UserBranch)) {
                /* TABLE T_Branch */
                $query_branch = $dbh->prepare("
                    SELECT 
                        T_Branch.BrnCode,T_Branch.BrnName,
                        T_Cashier.CshName, T_Cashier.CshDatabaseServerAlone
                    FROM 
                        T_Branch 
                    JOIN 
                        T_Cashier
                    ON 
                        T_Branch.BrnCode=T_Cashier.CshBranch
                    WHERE
                        BrnCode='$UserBranch'
                ");

                $query_branch->execute();
                
                while($row = $query_branch->fetch()) {
                    $BrnName = $row['BrnName'];
                    $CshDatabaseServerAlone[$row["CshDatabaseServerAlone"]] = $row["CshDatabaseServerAlone"];  
                    //$CshDatabaseServerAlone[] = $row['CshDatabaseServerAlone'];
                }
                var_dump($CshDatabaseServerAlone);
                unset($dbh);
                unset($query_branch);

                /* ตรวจสอบความถูกต้องเรียบร้อย และเก็บค่าใน Session */
                $session = Yii::$app->session;
                $session->set('UserID', $UserID);
                $session->set('UserName', $UserName);
                $session->set('UserBranch', $UserBranch);
                $session->set('BrnName', $BrnName);
                $session->set('CshDatabaseServerAlone', $CshDatabaseServerAlone);

                return $this->redirect(array('repair/index'));
                
            } else {
                /* รหัสพนักงานหรือรหัสผ่านไม่ถูกต้อง */
                \Yii::$app->getSession()->setFlash('loginError', 'รหัสพนักงาน '.$_POST['UserID'].' หรือรหัสผ่านไม่ถูกต้อง');
                $this->redirect('login');
            }

            unset($dbh);
            unset($query);

            //echo $UserID.' ',$UserName.' '.$UserBranch;

        } else {
            return $this->render('index');
        }
        
    }

    /* ออกจากระบบ */
    public function actionLogout()
    {
        $session = Yii::$app->session;
        $session->removeAll();

        return $this->redirect('index');
    }

}
