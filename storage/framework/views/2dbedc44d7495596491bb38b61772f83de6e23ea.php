<?php $__env->startSection('title'); ?>
    Acceso denegado
<?php $__env->stopSection(); ?>

<link href="<?php echo e(asset('css/login.css')); ?>" rel="stylesheet">

<?php $__env->startSection('content'); ?>

    <form class="form-signin" style="margin-bottom: 2em">
        <div class="text-center">
            <img class="mb-4 te" src="../../../storage/saitamalogo.png" alt="" width="80"><br>
            <h2><b>Acceso<span class="text-danger"><i>Denegado</i></span></b></a></h3>
        </div>
        <div class="alert alert-danger text-center mb-3">
            <p>A esta página solo puede acceder un usuario registrado o con permisos de administrador.</p>
        </div>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>