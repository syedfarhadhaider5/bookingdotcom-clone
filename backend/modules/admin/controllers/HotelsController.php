<?php
namespace backend\modules\admin\controllers;

class HotelsController extends \yii\web\Controller
{
    public function actionIndex(){
        return $this->render('index');
    }
}
?>