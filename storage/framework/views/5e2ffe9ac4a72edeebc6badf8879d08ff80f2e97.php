<?php $__env->startSection('title'); ?>
  Login
<?php $__env->stopSection(); ?>

<link href="<?php echo e(asset('css/login.css')); ?>" rel="stylesheet">

<?php $__env->startSection('content'); ?>

    <form class="form-signin" action="<?php echo e(route('login')); ?>" method="POST" style="margin-bottom: 2em">
        <?php echo e(csrf_field()); ?>

        <div class="text-center">
            <img class="mb-4 te" src="../../../storage/saitamalogo.png" alt="" width="80"><br>
            <h2><b>Saitama<span class="text-danger"><i>Login</i></span></b></h2>
        </div>
        <label for="inputEmail" class="sr-only">Dirección e-mail</label>
        <input type="email" id="email" class="form-control" name="email" placeholder="Dirección e-mail" value="<?php echo e(old('email')); ?>"required autofocus>

        <?php if($errors->has('email')): ?>

            <span class="help-block">
                <strong><?php echo e($errors->first('email')); ?></strong>
            </span>

        <?php endif; ?>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>

        <?php if($errors->has('password')): ?>
                                        
            <span class="help-block">
                <strong><?php echo e($errors->first('password')); ?></strong>
            </span>

        <?php endif; ?>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Recuérdame
            </label>
        </div>
        <button class="btn btn-lg btn-dark btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
        <a class="btn btn-link text-dark text-center" href="<?php echo e(route('password.request')); ?>">
            ¿Olvidaste tu contraseña?
        </a>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>