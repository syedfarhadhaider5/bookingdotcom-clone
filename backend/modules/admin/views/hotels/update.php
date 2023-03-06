<?php
/* @var $this yii\web\View */
/* @var $model common\models\Hotels */
?>
<div class="card">
    <div class="card-body custom-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= Yii::$app->urlManager->createUrl('user/index'); ?>">Hotels</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-primary">Update Hotel</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-primary text-bold"><?= $model->name; ?></a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="mt-3">
    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>