<?php

use common\grid\EnumColumn;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;


/**
 * @var yii\web\View $this
 * @var Common\models\User $user
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\models\search\UserSearch $userSearch
**/
?>
    <div class="card">
        <div class="card-body custom-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= Yii::$app->urlManager->createUrl('user/index'); ?>">Users</a></li>
                </ol>
            </nav>
        </div>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="card  mt-4">
            <div class="card-body">
                <div class="float-end">
                    <a href="<?= Url::to(['user/create']);?>">
                        <button type="button" class="btn btn-success">Add New User</button>
                    </a>
                </div>
                <div class="table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $userSearch,
                        'options' => [
                            'class' => 'gridstyles',
                        ],
                        'columns' => [
                            'id',
                            'username',
                            'email:email',
                            [
                                'attribute' => 'status',
                                'label' => 'status',
                                'value' => function ($model) {
                                    return $model::STATUS_LABELS[$model->status];
                                },
                                'filter'=> User::statuses(),
                            ],

                            [
                                'class' => ActionColumn::className(),
                                'template' => '{update} {delete}',
                                'buttons' => [
                                    'view' => function ($url, $model, $key) {
                                        return '<a  href="' . $url . '"><button class="btn btn-primary btn-sm">View</button></a>';
                                    },
                                    'update' => function ($url, $model, $key) {
                                        return '<a  href="' . $url . '"><button class="btn btn-warning btn-sm">Update</button></a>';
                                    },
                                    'delete' => function ($url, $model, $key) {
                                        return '<a data-method="post" href="' . $url . '"><button  class="btn btn-danger btn-sm" >Delete</button></a>';
                                    },
                                ],
                            ],
                        ],
                    ]); ?>

                </div>
            </div>
        </div>
    </div>
</div>
