<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4  align-items-center justify-content-center">
                <div class="card mt-5">
                    <div class="card-body custom-card">
                        <img class="d-block mx-auto img-fluid" src="<?= Yii::$app->getUrlManager()->createUrl('images/logo/bookinglogo.png') ?>" width="200px" height="auto">

                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <?= $form->field($model, 'rememberMe')->checkbox() ?>

                        <div class="form-group">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>



