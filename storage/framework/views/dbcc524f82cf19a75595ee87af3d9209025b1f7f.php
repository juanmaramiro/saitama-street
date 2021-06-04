<?php $__env->startSection('title'); ?>
    Perfil de <?php echo e(Auth::user()->name); ?>

<?php $__env->stopSection(); ?>

<link href="<?php echo e(asset('css/home.css')); ?>" rel="stylesheet">

<?php $__env->startSection('content'); ?>

    <section class="section-content padding-y" style="margin-bottom: 2em">
        <div class="container">
            <div class="row">
                <aside class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center">Perfil de <?php echo e(Auth::user()->name); ?></h5>

                            <?php if(!Auth::user()->avatar): ?>

                                <img src="../../../storage/default-avatar.png" alt="<?php echo e(Auth::user()->name); ?>" style="border-radius: 10px" class="img-fluid" max-width="100%" height= "auto"/>

                            <?php else: ?>

                                <img src="../../../storage/users_avatar/<?php echo e(Auth::user()->avatar); ?>" alt="<?php echo e(Auth::user()->name); ?>" style="border-radius: 10px" class="img-fluid" max-width="100%" height= "auto"/>

                            <?php endif; ?>

                            <br><br>
                            <form action="<?php echo e(route('update.avatar')); ?>" id="update-avatar" method="post" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <input type="file" class="form-control-file" id="avatar" name="avatar" form="update-avatar"accept="image/*">
                                </div>
                            </form>
                            <button type="button" class="btn btn-dark btn-lg btn-block" onclick="event.preventDefault(); document.getElementById('update-avatar').submit();">Editar avatar</button>
                        </div>
                    </div>
                </aside>
                <main class="col-md-9">
                    <div class="panel-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active text-dark" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-home"></i></a>
                                <a class="nav-item nav-link text-dark" id="nav-settings-tab" data-toggle="tab" href="#nav-settings" role="tab" aria-controls="nav-settings" aria-selected="false" title="Edita tus opciones"><i class="fas fa-cog"></i></a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><br>
                                <form>
                                    <div class="mb-3">
                                        <label for="username">Nickname</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control col-md-3" id="username" value="<?php echo e(Auth::user()->name); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control col-md-3" id="email" value="<?php echo e(Auth::user()->email); ?>" readonly>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab"><br>    
                                <form class="form-inline" action="<?php echo e(route('update.email')); ?>" id="update-email" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="form-group mx-sm-3 mb-2">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="<?php echo e(Auth::user()->email); ?>">
                                    </div>
                                    <button type="submit" class="btn btn-dark mb-2 col-md-3">Editar email</button>
                                </form>
                                <form class="form-inline" action="<?php echo e(route('update.password')); ?>" id="update-password" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="form-group mx-sm-3 mb-2">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Nueva password">
                                    </div>
                                    <button type="submit" class="btn btn-dark mb-2 col-md-3">Editar contraseña</button>
                                </form>
                            </div>
                        </div>
                    </div>   
                </main>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>