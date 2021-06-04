<?php $__env->startSection('title'); ?>
	Editar categoría
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-lg-6">
			<div class="table-data__tool-left">
                <h3 class="title-5 m-b-35">Edita la categoría (<?php echo e($category->category_name); ?>)</h3>
            </div>
            <form action="<?php echo e(url('admin/categories/update')); ?>/<?php echo e($category->id); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="category_name" class="control-label mb-1">Nombre Categoría</label>
                    <input id="category_name" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Introduce el nombre de la categoría" value="<?php echo e($category->category_name); ?>" required>
                </div>
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block">
                        <i class="fas fa-pencil-alt"></i>&nbsp;
                        <span id="payment-button-amount">Editar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboardLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>