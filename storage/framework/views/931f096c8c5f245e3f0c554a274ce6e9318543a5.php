<?php $__env->startSection('title'); ?>
	<?php echo e($product->product_name); ?>

<?php $__env->stopSection(); ?>

<link href="<?php echo e(asset('css/viewProducts.css')); ?>" rel="stylesheet">

<?php $__env->startSection('content'); ?>

	<div class="container" style="margin-bottom: 2em">
		<div class="card">
			<div class="container-fluid">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<div class="preview-pic tab-content">
							 <div class="tab-pane active" id="pic-1"><img src="../../../storage/products_images/<?php echo e($product->product_image); ?>" /></div>
						</div>
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?php echo e($product->product_name); ?></h3>
						<div class="category">
								
							<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<?php if($category->id == $product->category_id): ?>

									<p class="text-danger font-weight-bold"><?php echo e($category->category_name); ?></p>

								<?php endif; ?>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</div><br>
						<p class="product-description"><?php echo e($product->product_description); ?></p>
						<div>
							<h4><?php echo e($product->product_price); ?> €</h4>
						</div>
						<div>
							<label for="product_quantity" class="control-label mb-1">Cantidad</label>
							<input id="product_quantity" class="form-control" name="product_quantity" type="number" form="add-cart-form" value="1" min="1" style="width:4em">
						</div><br>
	              
						<div class="action">

							<?php if(Auth::user()): ?>

								<button class="btn btn-danger col-md-4" type="button" onclick="event.preventDefault(); document.getElementById('add-cart-form').submit();">
									<i class="fas fa-shopping-cart"></i> Añadir al carrito
								</button>
								<!-- Hidden form -->
								<form id="add-cart-form" action="<?php echo e(route('cart.store')); ?>" method="POST" style="display: none;">
	                        		<?php echo e(csrf_field()); ?>

	                        		<input id="product_id" name="product_id" type="hidden" value="<?php echo e($product->id); ?>">
	                        		<input id="user_id" name="user_id" type="hidden" value="<?php echo e(Auth::user()->id); ?>">
	                    		</form>

							<?php else: ?>

								<button class="btn btn-outline-secondary col-md-4" type="button" disabled>
									<i class="fas fa-shopping-cart"></i> Añadir al carrito
								</button>
								<div>
									<small class="text-secondary font-italic">Debes estar logueado para añadir</small><br> 
								</div>

							<?php endif; ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>