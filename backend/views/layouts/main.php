<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;
use yii\web\Response;
use yii\widgets\ActiveForm;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <link rel="icon" href="<?= Yii::$app->urlManager->createUrl('images/logo/fvlogo.ico'); ?>" type="image/x-icon">

    <title><?= env('APP_TITLE') ?></title>
    <?php $this->head() ?>
</head>
<body class="sidebar-mini layout-fixed" style="height: auto;">
<div class="wrapper">

<?php $this->beginBody() ?>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <img src="<?= Yii::$app->urlManager->createUrl('images/farhad.jpg') ?>" class="rounded-circle" alt="User Image" style="width: 30px; height: 30px; ">
                </a>
                <div class="dropdown-menu dropdown-menu-xl-start dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="<?= Yii::$app->urlManager->createUrl('sign-in/logout') ?>" data-method="post" class="dropdown-item">
                         Logout
                    </a>

                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container start-->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link d-flex align-items-center justify-content-center text-decoration-none">
            <img src="<?= Yii::$app->urlManager->createUrl('images/logo/bookinglogo.png') ?>" alt="Booking.com" class="brand-image "
                 style="opacity: .8; width: 200px">
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?= Yii::$app->urlManager->createUrl('images/farhad.jpg') ?>" class="rounded-circle" alt="User Image" style="width: 30px; height: 30px; ">
                </div>
                <div class="info">
                    <a href="#" class="d-block text-decoration-none"><?= ucfirst(Yii::$app->user->identity->username) ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Hotels
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= Yii::$app->urlManager->createUrl('admin/hotels/index')?>" class="nav-link">
                                    <i class="fa fa-hotel nav-icon"></i>
                                    <p>All Hotels</p>
                                </a>
                                <a href="<?= Yii::$app->urlManager->createUrl('admin/hotels/create')?>" class="nav-link">
                                    <i class="fa fa-hotel nav-icon"></i>
                                    <p>Add Hotel</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?= Yii::$app->urlManager->createUrl('user/index')?>" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Main Sidebar end -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <section class="content">
                <div class="container-fluid">
                    <main role="main" class="flex-shrink-0">
                            <?= Breadcrumbs::widget([
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            ]) ?>
                            <?= Alert::widget() ?>
                            <?= $content ?>
                    </main>
                </div>
            </section>
        </div>
        <!-- /.content-header -->
    </div>

</div>
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage();
