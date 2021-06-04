<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/jpg" href="../../../storage/favicon.ico"/>

    <!-- Title Page-->
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Fontfaces CSS-->
    <link href="<?php echo e(asset('admin_assets/css/font-face.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css')); ?>" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo e(asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css')); ?>" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo e(asset('admin_assets/vendor/animsition/animsition.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('admin_assets/vendor/wow/animate.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('admin_assets/vendor/css-hamburgers/hamburgers.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('admin_assets/vendor/slick/slick.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('admin_assets/vendor/select2/select2.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.css')); ?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo e(asset('admin_assets/css/theme.css')); ?>" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="<?php echo e(url('/')); ?>">
                            <img src="<?php echo e(asset('admin_assets/images/icon/logo.png')); ?>" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="<?php echo e(url('admin')); ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('getUsers')); ?>">
                                <i class="fas fa-users"></i>Usuarios</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('getCategories')); ?>">
                                <i class="far fa-list-alt"></i>Categorías</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('getProducts')); ?>">
                                <i class="fas fa-dolly-flatbed"></i>Productos</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('getCoupons')); ?>">
                                <i class="fas fa-gift"></i>Cupones</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="../../../storage/saitamalogo.png" width="37" class="d-inline-block align-top " alt=""> <b><span class="text-dark">Saitama</span><span class="text-danger"><i>Street</i></span></b></a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="<?php echo e(url('admin')); ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('getUsers')); ?>">
                                <i class="fas fa-users"></i>Usuarios</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('getCategories')); ?>">
                                <i class="far fa-list-alt"></i>Categorías</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('getProducts')); ?>">
                                <i class="fas fa-dolly-flatbed"></i>Productos</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('getCoupons')); ?>">
                                <i class="fas fa-gift"></i></i>Cupones</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="../../../storage/users_avatar/<?php echo e(Auth::user()->avatar); ?>" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo e(Auth::user()->name); ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../../../storage/users_avatar/<?php echo e(Auth::user()->avatar); ?>" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo e(Auth::user()->name); ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo e(Auth::user()->email); ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="<?php echo e(url('home')); ?>">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="zmdi zmdi-power"></i>Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

    <!-- Jquery JS-->
    <script src="<?php echo e(asset('admin_assets/vendor/jquery-3.2.1.min.js')); ?>"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo e(asset('admin_assets/vendor/bootstrap-4.1/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')); ?>"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo e(asset('admin_assets/vendor/slick/slick.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('admin_assets/vendor/wow/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/vendor/animsition/animsition.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('admin_assets/vendor/counter-up/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/vendor/counter-up/jquery.counterup.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('admin_assets/vendor/circle-progress/circle-progress.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/vendor/chartjs/Chart.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/vendor/select2/select2.min.js')); ?>">
    </script>

    <!-- Main JS-->
    <script src="<?php echo e(asset('admin_assets/js/main.js')); ?>"></script>

</body>

</html>
<!-- end document-->
