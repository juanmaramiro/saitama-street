<?php $__env->startSection('title'); ?>
	Productos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <h3 class="title-5 m-b-35">Listado de Productos</h3>
                </div>
                <div class="table-data__tool-right">
                    <a href="<?php echo e(url('admin/products/addProduct')); ?>">
                        <button class="btn btn-info">
                            <i class="fas fa-plus-circle"></i> Nuevo Producto
                        </button>
                    </a>
                    <!--<a href="<?php echo e(url('admin/categories/addCategory')); ?>">
                        <button class="btn btn-secondary">
                            <i class="fas fa-file-alt"></i> Exportar
                        </button>
                    </a>-->
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead class="table-secondary">
                        <tr>
                            <th class="d-none d-md-table-cell"></th>
                            <th>Nombre</th>
                            <th class="d-none d-md-table-cell">Precio</th>
                            <th class="d-none d-md-table-cell">Categoría</th>
                            <th class="d-none d-md-table-cell">Imagen</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr class="tr-shadow">
                            <td class="d-none d-md-table-cell"></td>
                            <td><?php echo e($product->product_name); ?></td>
                            <td class="d-none d-md-table-cell"><?php echo e($product->product_price); ?></td>

                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          
                                <?php if($product->category_id == $category->id): ?>

                                    <td class="d-none d-md-table-cell"><?php echo e($category->category_name); ?></td>

                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <td class="d-none d-md-table-cell"><img src="../../../storage/products_images/<?php echo e($product->product_image); ?>" width="50" height="50"></td>
                            <td>              
                                <a href="<?php echo e(url('admin/products/editProduct')); ?>_<?php echo e($product->id); ?>">
                                    <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Editar">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </a>
                                <a href="<?php echo e(url('admin/products/delete')); ?>_<?php echo e($product->id); ?>">
                                    <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </a>                
                            </td>
                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboardLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>