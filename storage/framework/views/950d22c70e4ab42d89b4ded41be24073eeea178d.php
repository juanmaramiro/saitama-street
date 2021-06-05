<?php $__env->startSection('title'); ?>
	Añade un nuevo producto
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-lg-6">
			<div class="table-data__tool-left">
                <h3 class="title-5 m-b-35">Añade un nuevo producto</h3>
            </div>
            <form action="<?php echo e(route('products.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="product_name" class="control-label mb-1">Nombre del producto</label>
                    <input id="product_name" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Introduce el nombre del producto" required>
                </div>
                <div class="form-group">
                    <label for="product_description" class="control-label mb-1">Descripción del producto</label>
                    <textarea id="product_description" name="product_description" class="form-control" rows="4" aria-required="true" aria-invalid="false" placeholder="Introduce la descripción del producto"></textarea>
                </div>
                <div class="form-group">
                    <label for="product_price" class="control-label mb-1">Precio del producto</label>
                    <input id="product_price" name="product_price" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Introduce el precio del producto" required>
                </div>
            
                <div class="form-group">
                    <label for="category">Categoría del producto</label>
                        <select id="product_category" name="product_category" class="form-control">
                            
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        </select>
                </div>
                <div class="form-group">
                    <label for="product_image">Imagen del producto</label>
                    <input type="file" class="form-control-file" id="product_image" name="product_image" accept="image/*" required>
                </div>
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        <i class="fas fa-plus-circle"></i>&nbsp;
                        <span>Añadir</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboardLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>