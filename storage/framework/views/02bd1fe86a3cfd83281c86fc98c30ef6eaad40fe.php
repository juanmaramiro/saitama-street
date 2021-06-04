<?php $__env->startSection('title'); ?>
	Admin Panel
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Vista general</h2>
            </div>
        </div>
    </div>
    <div class="row m-t-25">
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c1" style="padding-bottom: 3em">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="text">

                            <?php
                                $usersCount = DB::table('users')
                                    ->count('id');
                            ?>

                            <h2><?php echo e($usersCount); ?></h2>
                            <span>usuarios registrados</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c2" style="padding-bottom: 3em">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-dolly-flatbed"></i>
                        </div>
                        <div class="text">

                            <?php
                                $productsCount = DB::table('products')
                                    ->count('id');
                            ?>

                            <h2><?php echo e($productsCount); ?></h2>
                            <span>productos en venta</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c3" style="padding-bottom: 3em">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-calendar-note"></i>
                        </div>
                        <div class="text">

                            <?php
                                $categoriesCount = DB::table('categories')
                                    ->count('id');
                            ?>

                            <h2><?php echo e($categoriesCount); ?></h2>
                            <span>categorias creadas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c4" style="padding-bottom: 3em">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <div class="text">

                            <?php
                                $couponsCount = DB::table('coupons')
                                    ->count('id');
                            ?>

                            <h2><?php echo e($couponsCount); ?></h2>
                            <span>cupones disponibles</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="au-card chart-percent-card">
                <div class="au-card-inner">
                    <h3 class="title-2 tm-b-5">Nº de productos por Colecciones</h3>
                    <div class="row no-gutters">
                        <div class="col-xl-6">
                            <div class="chart-note-wrap">
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--dark-blue"></span>
                                    <span>Final Fantasy</span>
                                </div>
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--orange"></span>
                                    <span>Dragon Ball</span>
                                </div>
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--purple"></span>
                                    <span>Harry Potter</span>
                                </div>
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--green"></span>
                                    <span>Star Wars</span>
                                </div>
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--red"></span>
                                    <span>Marvel</span>
                                </div>
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--black"></span>
                                    <span>DC Comics</span>
                                </div>
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--pink"></span>
                                    <span>Cine</span>
                                </div>
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--yellow"></span>
                                    <span>Gaming</span>
                                </div>
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--blue"></span>
                                    <span>Assassin's Creed</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="percent-chadrt">
                                <canvas id="percent-chart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="au-card chart-percent-card">
                <div class="au-card-inner">
                    <h3 class="title-2 tm-b-5">Nº de productos</h3>
                    <div class="row no-gutters">
                        <div class="col-xl-6">
                            <div class="chart-note-wrap">
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--blue"></span>
                                    <span>Camisetas</span>
                                </div>
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--red"></span>
                                    <span>Figuras</span>
                                </div>
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--green"></span>
                                    <span>Funko Pop!</span>
                                </div>
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--yellow"></span>
                                    <span>Tazas</span>
                                </div>
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--purple"></span>
                                    <span>Fundas Móvil</span>
                                </div>
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--pink"></span>
                                    <span>Peluches</span>
                                </div>
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--orange"></span>
                                    <span>Mascarillas</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="percent-chadrt">
                                <canvas id="percent-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboardLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>