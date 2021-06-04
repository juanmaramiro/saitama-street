<?php $__env->startSection('title'); ?>
  SaitamaStreet
<?php $__env->stopSection(); ?>

<link href="<?php echo e(asset('css/catallection.css')); ?>" rel="stylesheet">

<?php $__env->startSection('content'); ?>
<section>
<main role="main" style="margin-bottom: 2em">
  <div class="album bg-white">
    <div class="container">
      <div class="row">
    
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <span class="img-fluid"><img src="../../../storage/products_images/<?php echo e($product->product_image); ?>" width="100%" style="" onclick="window.location='<?php echo e(url('product')); ?>/<?php echo e($product->id); ?>';"></span>
                <div class="card-body">
                  <h5 class="card-title font-weight-bold" onclick="window.location='<?php echo e(url('product')); ?>/<?php echo e($product->id); ?>';"><?php echo e($product->product_name); ?></h5>
                    <div class="d-flex justify-content-between align-items-center">
                      
                        <?php if(auth()->guard()->guest()): ?>

                        <div class="btn-group">
                          <input type="button" class="btn btn-success font-weight-bold text-light" value="<?php echo e($product->product_price.'€'); ?>" disabled>

                          <button class="btn btn-outline-dark" type="button" title="Debes estar logueado para añadir productos al carrito" disabled><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                        </div>

                        <?php else: ?>

                        <div class="btn-group">
                          <input type="button" class="btn btn-danger font-weight-bold text-light" value="<?php echo e($product->product_price.'€'); ?>" disabled>

                          <button class="btn btn-dark" type="button" onclick="event.preventDefault(); document.getElementById('add-cart-form-<?php echo e($product->id); ?>').submit();"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                        </div>
                      
                        <form id="add-cart-form-<?php echo e($product->id); ?>" action="<?php echo e(route('cart.store')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                            <input id="product_id" name="product_id" type="hidden" value="<?php echo e($product->id); ?>">
                            <input id="product_quantity" name="product_quantity" type="hidden" value="1">
                            <input id="user_id" name="user_id" type="hidden" value="<?php echo e(Auth::user()->id); ?>">
                        </form>

                        <?php endif; ?>
                      
                  </div>
                </div>
            </div>
          </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
    </div>
  </div>

</main>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>