<?php $__env->startSection('title'); ?>
  Recuperar contraseña
<?php $__env->stopSection(); ?>

<link href="<?php echo e(asset('css/login.css')); ?>" rel="stylesheet">

<?php $__env->startSection('content'); ?>

    <form class="form-signin" action="<?php echo e(route('password.email')); ?>" method="POST" style="margin-bottom: 2em">
        <?php echo e(csrf_field()); ?>

        <div class="text-center">
            <img class="mb-4 te" src="../../../storage/saitamalogo.png" alt="" width="80"><br>
            <h2><b>Saitama<span class="text-danger"><i>Reset</i></span></b></a></h3>
        </div>
        <label for="inputEmail" class="sr-only">Dirección e-mail</label>
        <input type="email" id="email" class="form-control" name="email" placeholder="Dirección e-mail" value="<?php echo e(old('email')); ?>" style="border-radius: 2px" required autofocus>

        <?php if($errors->has('email')): ?>

            <span class="help-block">
                <strong><?php echo e($errors->first('email')); ?></strong>
            </span>

        <?php endif; ?>

        <button class="btn btn-lg btn-dark btn-block" style="margin-top: 1em" type="submit"><i class="fas fa-envelope"></i> Reset</button>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>