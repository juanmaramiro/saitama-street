<?php $__env->startSection('title'); ?>
	Usuarios
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <h3 class="title-5 m-b-35">Listado de Usuarios</h3>
                </div>
                <div class="table-data__tool-right">
                    <!--<a href="<?php echo e(url('admin/addCategory')); ?>">
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
                            <th>Email</th>
                            <th>Rol</th>
                        </tr>
                    </thead>
                    <tbody>

                         <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                            <tr class="tr-shadow">
                                <td class="d-none d-md-table-cell"></td>
                                <td><?php echo e($user->name); ?></td>
                                <td>
                                    <span class="block-email"><?php echo e($user->email); ?></span>
                                </td>
                                                
                                <?php if($user->admin == 1): ?>
                                                
                                    <td><a href="<?php echo e(url('admin/users/update')); ?>/<?php echo e($user->id); ?>"><span class="role member">Admin</span></a></td>
                                                
                                <?php else: ?>
                                                
                                    <td><a href="<?php echo e(url('admin/users/update')); ?>/<?php echo e($user->id); ?>"><span class="role user">User</span></a></td>
                                                
                                <?php endif; ?>
                                            
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