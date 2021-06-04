<?php $__env->startSection('title'); ?>
  Contacta con nosotros
<?php $__env->stopSection(); ?>

<link href="<?php echo e(asset('css/home.css')); ?>" rel="stylesheet">

<?php $__env->startSection('content'); ?>
  
  <main role="main" class="container card" style="margin-bottom: 2em">
    <div class="container">
      <h3 style="padding-top: 1em">Formulario de Contacto</h3>
      <form action="mailto:admin@saitamastreet.com" method="post" enctype="text/plain">
        <div class="form-group">
          <label for="inputUsername">Usuario</label>
          <input type="text" class="form-control col-md-5" id="inputUsername" placeholder="Usuario" value="<?php echo e(Auth::user()->name); ?>" readonly>
        </div>
        <div class="form-group">
          <label for="inputEmail">Email</label>
          <input type="email" class="form-control col-md-5" id="inputEmail" placeholder="Email" value="<?php echo e(Auth::user()->email); ?>" readonly>
        </div>
        <div class="form-group">
          <label for="inputSubject">Asunto</label>
          <input type="text" class="form-control col-md-5" id="inputSubject" placeholder="Asunto" required>
        </div>
        <div class="form-group">
          <label for="inputDescription">Descripción</label>
          <textarea class="form-control col-md-5" id="inputDescription" placeholder="Descripcion" required></textarea>
        </div>
        <button type="submit" class="btn btn-dark btn-lg col-md-5" style="margin-bottom: 1em"><i class="fas fa-envelope"></i> Enviar</button>
      </form>
    </div>
  </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>