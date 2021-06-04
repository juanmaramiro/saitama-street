<?php $__env->startSection('title'); ?>
	Editar cupón
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-lg-6">
			<div class="table-data__tool-left">
                <h3 class="title-5 m-b-35">Edita el cupón (<?php echo e($coupon->coupon_name); ?>)</h3>
            </div>
            <form action="<?php echo e(url('admin/coupons/update')); ?>/<?php echo e($coupon->id); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="coupon_name" class="control-label mb-1">Nombre del cupón</label>
                    <input id="coupon_name" name="coupon_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Introduce el nombre del cupón" value="<?php echo e($coupon->coupon_name); ?>" required>
                </div>
                <div class="form-group">
                    <label for="coupon_code" class="control-label mb-1">Código del cupón</label>
                    <input id="coupon_code" name="coupon_code" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Introduce el código del cupón" value="<?php echo e($coupon->coupon_code); ?>" required>
                </div>
                <div class="form-group">
                    <label for="coupon_value" class="control-label mb-1">Valor del cupón</label>
                    <input id="coupon_value" name="coupon_value" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Introduce el valor del cupón" value="<?php echo e($coupon->coupon_value); ?>" required>
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