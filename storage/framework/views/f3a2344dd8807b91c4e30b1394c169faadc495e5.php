<?php $__env->startSection('title'); ?>
  SaitamaStreet
<?php $__env->stopSection(); ?>

<link href="<?php echo e(asset('css/index.css')); ?>" rel="stylesheet">

<?php $__env->startSection('content'); ?>

  <main role="main">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../../../storage/carousel_images/female-eivor-assassins-creed-valhalla-pc-games-playstation-1920x1080-1748.jpg" width="100%" class="d-none d-sm-none d-md-block">
          <img src="../../../storage/carousel_images/female-eivor-assassins-creed-valhalla-pc-games-playstation-618x1080-1748.jpg" width="100%" class="d-block d-sm-block d-md-none">
          <div class="container">
            <div class="carousel-caption">
              <h1 style="text-shadow: 0 0 3px #A08B7A, 0 0 5px #000000;">Nueva colección Assassin's Creed</h1>
              <p style="text-shadow: 0 0 3px #A08B7A, 0 0 5px #000000;">¡Descubre los nuevos productos oficiales de esta increíble saga!</p>
              <p><a class="btn btn-lg btn-light" href="<?php echo e(route('getCollection', ['category' => 'assassins-creed'])); ?>">Ver colección</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../../../storage/carousel_images/cropped-1920-1080-928770.jpg" width="100%" class="d-none d-sm-none d-md-block">
          <img src="../../../storage/carousel_images/cropped-665-1080-928770.jpg" width="100%" class="d-block d-sm-block d-md-none">
          <div class="container">
            <div class="carousel-caption text-right">
              <h1 style="text-shadow: 0 0 3px #A08B7A, 0 0 5px #000000;">Semana Final Fantasy</h1>
              <p style="text-shadow: 0 0 3px #A08B7A, 0 0 5px #000000;">¡Hazte con todo su merchandising al mejor precio!</p>
              <p><a class="btn btn-lg btn-light" href="<?php echo e(route('getCollection', ['category' => 'final-fantasy'])); ?>">Ver productos</a></p>
            </div>
          </div>
        </div>
        
        <div class="carousel-item">
          <img src="../../../storage/carousel_images/game-consoles-1920×1080.jpg" width="100%" class="d-none d-sm-none d-md-block">
          <img src="../../../storage/carousel_images/game-consoles-623×1080.jpg" width="100%" class="d-block d-sm-block d-md-none">
          <div class="container">
            <div class="carousel-caption text-right">
              <h1 style="text-shadow: 0 0 3px #A08B7A, 0 0 5px #000000;">Merchandising oficial de tus plataformas favoritas</h1>
              <p style="text-shadow: 0 0 3px #A08B7A, 0 0 5px #000000;">¡El mejor merchandising para todo consolero que se precie!</p>
              <p><a class="btn btn-lg btn-light" href="<?php echo e(route('getCollection', ['category' => 'gaming'])); ?>">Ver productos</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="album bg-white">
      <div class="container">
        <h2 style="margin-bottom: 1em">Últimos productos añadidos</h2>
        <div class="row">
      
          <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <!--<?php if(strpos($product->product_name, 'a') !== false): ?>-->

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

            <!--<?php endif; ?>-->

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
      </div>
    </div>
  </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>