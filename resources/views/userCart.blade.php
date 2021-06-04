@extends('layouts.page')

@section('title')
  Carrito de {{ Auth::user()->name }}
@stop

<style type="text/css">
  body {
        padding-top: 3rem;
      }
</style>

@section('content')

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

                  @foreach($carts as $cart)

                    @if($cart->cart_user_id == Auth::user()->id)
    
                      <tr>

                      @foreach($products as $product)

                        @if ($product->id == $cart->cart_product_id)
        
                        <td>
                          <figure class="itemside">
                            <div class="aside"><img src="../../../storage/products_images/{{ $product->product_image }}" class="img-sm" /></div>
                            <figcaption class="info">
                              <a href="{{ url('product') }}/{{$product->id}}" class="title text-dark">{{ $product->product_name }}</a>

                              @foreach($categories as $category)

                                @if($category->id == $product->category_id)

                                  <p class="small text-danger"><b>{{ $category->category_name }}</b></p>
                    
                                @endif
                    
                              @endforeach

                              <p class="small text-dark"><b>{{ $product->product_price }}€</b></p>
                            </figcaption>
                          </figure>
                        </td>
                        <td> 
                          <input type="number" class="form-control" name="product_quantity_{{$cart->id}}" style="width: 4em;" value="{{ $cart->product_quantity }}" form="update-quantity-{{$cart->id}}" min="1"> 
                        </td>
                        <td> 
                          <div class="price-wrap">
                            <var class="price">{{ $product->product_price * $cart->product_quantity}}</var>
                            <small class="text-muted"> {{ $product->product_price }}€/u </small> 
                          </div>
                        </td>
                        <!-- Hidden form -->
                        <form id="update-quantity-{{$cart->id}}" action="{{ route('cart.update') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                          <input id="cart_id" name="cart_id" type="hidden" value="{{$cart->id }}">
                        </form>
                        
                        @endif

                      @endforeach
        
                        <td class="text-right">
                          <a href="{{ url('carrito/update') }}" title="Actualizar cantidad" class="btn btn-light mr-2"><i class="fas fa-sync-alt" onclick="event.preventDefault(); document.getElementById('update-quantity-{{$cart->id}}').submit();"></i></a> 
                          <a href="{{ url('carrito/delete') }}_{{$cart->id}}" title="Eliminar del carrito" class="btn btn-light mr-2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                    
                    @endif

                  @endforeach
                    
                </tbody>
              </table>
    
              <div class="card-body border-top">
                <a href="{{url('/')}}" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continua comprando</a>
              </div>  
            </div>
    
            <div class="alert alert-success mt-3">
              <p class="icontext"><i class="icon text-success fa fa-truck"></i> Envío en 24h para toda la península y Baleares.</p>
            </div>    
          </main>

          <aside class="col-md-3">
            <div class="card mb-3">
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <label>¿Tienes un cupón?</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="" placeholder="Coupon code">
                      <span class="input-group-append"> 
                        <button class="btn btn-dark">Aplicar</button>
                      </span>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <dl class="dlist-align">
                  <dt>Precio total:</dt>
                  <dd class="text-right">{{ $total }}€</dd>
                </dl>
                <dl class="dlist-align">
                  <dt>Descuento:</dt>

                    @php

                      $descuento = 3;
                          
                    @endphp

                  <dd class="text-right">-{{ $descuento }}€</dd>
                </dl>
                <dl class="dlist-align">
                  <dt>Total:</dt>
                  <dd class="text-right h5"><strong>{{$total - $descuento }}€</strong></dd>
                </dl>
                <hr>
                <a href="{{route('checkout')}}">
                  <button class="btn btn-danger col-md-12">
                    <i class="fas fa-box"></i> Realizar pedido
                  </button>
                </a>     
              </div>
            </div>
          </aside>
        </div>
    
      </div>
    </section>

    <section class="section-name bg padding-y" style="margin-bottom: 2em">
      <div class="container">
        <h6>Productos erróneos o defectuosos</h6>
        <p class="text-justify">Si el pedido entregado es erróneo o si el Producto presenta algún defecto, el Cliente deberá notificar en primer lugar al equipo de soporte que desea devolverlo; dicha notificación debe efectuarse en un plazo de 72 horas a contar desde el momento de la entrega, indicando en el asunto del correo electrónico: PRODUCTO DEFECTUOSO. El Cliente deberá proporcionar asimismo información adicional con el fin de explicar por qué es defectuoso el Producto. Para devolverlo, el Cliente debe seguir el procedimiento que le indicará el servicio de soporte.</p>
        <p class="text-justify">El Vendedor o el proveedor de servicios logísticos de este recibirán el Producto y lo enviarán a los correspondientes especialistas para someterlo a las pruebas pertinentes. Toda devolución atribuida a un defecto se someterá a la correspondiente verificación.</p>
        <p class="text-justify">Si se confirma el defecto, el Cliente podrá solicitar el cambio del Producto o su reembolso. El cambio de Productos estará sujeto a la disponibilidad de existencias. Si se ha agotado el Producto, se autorizará un reembolso. El coste asociado a la devolución de un Producto defectuoso únicamente se reembolsará (con un límite de 15 euros) cuando el Distribuidor haya verificado que, efectivamente, era defectuoso. En el caso de un cambio, el coste del nuevo envío será a cargo del Distribuidor.</p>
      </div>
    </section>

@stop
