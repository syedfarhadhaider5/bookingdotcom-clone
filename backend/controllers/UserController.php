<?php

namespace backend\controllers;

use backend\models\UserForm;
use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * SignIn controller
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['sign-in/index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
}