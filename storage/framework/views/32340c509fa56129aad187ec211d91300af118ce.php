<?php $__env->startSection('title'); ?>
  Carrito de <?php echo e(Auth::user()->name); ?>

<?php $__env->stopSection(); ?>

<style type="text/css">
  body {
        padding-top: 3rem;
      }
</style>

<?php $__env->startSection('content'); ?>

    <section class="section-content padding-y">
      <div class="container">
    
        <div class="row">
          <main class="col-md-9">
            <div class="card">
    
              <table class="table table-borderless table-shopping-cart">
                <thead class="text-muted">
      
                  <tr class="small text-uppercase">
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col" width="120">Precio</th>
                    <th scope="col" class="text-right" width="200"> </th>
                  </tr>
                </thead>
                <tbody>

                  <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($cart->cart_user_id == Auth::user()->id): ?>
    
                      <tr>

                      <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($product->id == $cart->cart_product_id): ?>
        
                        <td>
                          <figure class="itemside">
                            <div class="aside"><img src="../../../storage/products_images/<?php echo e($product->product_image); ?>" class="img-sm" /></div>
                            <figcaption class="info">
                              <a href="<?php echo e(url('product')); ?>/<?php echo e($product->id); ?>" class="title text-dark"><?php echo e($product->product_name); ?></a>

                              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if($category->id == $product->category_id): ?>

                                  <p class="small text-danger"><b><?php echo e($category->category_name); ?></b></p>
                    
                                <?php endif; ?>
                    
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                              <p class="small text-dark"><b><?php echo e($product->product_price); ?>???</b></p>
                            </figcaption>
                          </figure>
                        </td>
                        <td> 
                          <input type="number" class="form-control" name="product_quantity_<?php echo e($cart->id); ?>" style="width: 4em;" value="<?php echo e($cart->product_quantity); ?>" form="update-quantity-<?php echo e($cart->id); ?>" min="1"> 
                        </td>
                        <td> 
                          <div class="price-wrap">
                            <var class="price"><?php echo e($product->product_price * $cart->product_quantity); ?></var>
                            <small class="text-muted"> <?php echo e($product->product_price); ?>???/u </small> 
                          </div>
                        </td>
                        <!-- Hidden form -->
                        <form id="update-quantity-<?php echo e($cart->id); ?>" action="<?php echo e(route('cart.update')); ?>" method="POST" style="display: none;">
                          <?php echo e(csrf_field()); ?>

                          <input id="cart_id" name="cart_id" type="hidden" value="<?php echo e($cart->id); ?>">
                        </form>
                        
                        <?php endif; ?>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                        <td class="text-right">
                          <button title="Actualizar cantidad" type="submit" class="btn btn-light mr-2" form="update-quantity-<?php echo e($cart->id); ?>"><i class="fas fa-sync-alt"></i></button> 
                          <a href="<?php echo e(url('carrito/delete')); ?>_<?php echo e($cart->id); ?>" title="Eliminar del carrito" class="btn btn-light mr-2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                    
                    <?php endif; ?>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </tbody>
              </table>
    
              <div class="card-body border-top">
                <a href="<?php echo e(url('/')); ?>" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continua comprando</a>
              </div>  
            </div>
    
            <div class="alert alert-success mt-3">
              <p class="icontext"><i class="icon text-success fa fa-truck"></i> Env??o en 24h para toda la pen??nsula y Baleares.</p>
            </div>    
          </main>

          <aside class="col-md-3">
            <div class="card mb-3">
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <label>??Tienes un cup??n?</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="coupon" name="coupon" placeholder="Coupon code" form="check-coupon">
                      <span class="input-group-append">
                        <button class="btn btn-dark" type="submit" form="check-coupon">Aplicar</button>
                      </span>
                    </div>
                  </div>
                </form>
                <!-- Hidden form -->
                <form id="check-coupon" name="check-coupon" action="<?php echo e(route('check.coupon')); ?>" method="POST" style="display: none;">
                  <?php echo e(csrf_field()); ?>

                </form>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <dl class="dlist-align">
                  <dt>Precio total:</dt>
                  <dd class="text-right"><?php echo e($total); ?>???</dd>
                </dl>
                <dl class="dlist-align">
                  <dt>Descuento:</dt>
                  <dd class="text-right" id="discount" name="discount" form="go-checkout" value="<?php echo e($discount); ?>">-<?php echo e($discount); ?>???</dd>
                </dl>
                <dl class="dlist-align">
                  <dt>Total:</dt>
                  <dd class="text-right h5"><strong><?php echo e($total - $discount); ?>???</strong></dd>
                </dl>
                <hr>
                  <button class="btn btn-danger col-md-12" type="submit" form="checkout">
                    <i class="fas fa-box"></i> Realizar pedido
                  </button>
                <!-- Hidden form -->
                <form id="checkout" name="checkout" action="<?php echo e(route('checkout')); ?>" method="POST" style="display: none;">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" id="discount" name="discount" value="<?php echo e($discount); ?>">
                </form>
                <div>
              </div>
            </div>
          </aside>
        </div>
    
      </div>
    </section>

    <section class="section-name bg padding-y" style="margin-bottom: 2em">
      <div class="container">
        <h6>Productos err??neos o defectuosos</h6>
        <p class="text-justify">Si el pedido entregado es err??neo o si el Producto presenta alg??n defecto, el Cliente deber?? notificar en primer lugar al equipo de soporte que desea devolverlo; dicha notificaci??n debe efectuarse en un plazo de 72 horas a contar desde el momento de la entrega, indicando en el asunto del correo electr??nico: PRODUCTO DEFECTUOSO. El Cliente deber?? proporcionar asimismo informaci??n adicional con el fin de explicar por qu?? es defectuoso el Producto. Para devolverlo, el Cliente debe seguir el procedimiento que le indicar?? el servicio de soporte.</p>
        <p class="text-justify">El Vendedor o el proveedor de servicios log??sticos de este recibir??n el Producto y lo enviar??n a los correspondientes especialistas para someterlo a las pruebas pertinentes. Toda devoluci??n atribuida a un defecto se someter?? a la correspondiente verificaci??n.</p>
        <p class="text-justify">Si se confirma el defecto, el Cliente podr?? solicitar el cambio del Producto o su reembolso. El cambio de Productos estar?? sujeto a la disponibilidad de existencias. Si se ha agotado el Producto, se autorizar?? un reembolso. El coste asociado a la devoluci??n de un Producto defectuoso ??nicamente se reembolsar?? (con un l??mite de 15 euros) cuando el Distribuidor haya verificado que, efectivamente, era defectuoso. En el caso de un cambio, el coste del nuevo env??o ser?? a cargo del Distribuidor.</p>
      </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>