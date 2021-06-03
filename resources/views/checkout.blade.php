@extends('layouts.page')

@section('title')
	Realizar pedido
@stop

<link href="{{ asset('css/checkout.css') }}" rel="stylesheet">

@section('content')

	<div class="container">
  		<div class="py-5 text-center">
    		<img class="d-block mx-auto mb-4" alt="" width="72" height="72" src="../../../storage/pngwing.com.png" />
    		<h2>Formulario de envío</h2>
    		<p class="lead">Ya queda menos para realizar tu pedido, {{ Auth::user()->name }}, ¡solo te falta rellenar estos campos!</p>
  		</div>

  		<div class="row">
    		<div class="col-md-4 order-md-2 mb-4">
	      		<h4 class="d-flex justify-content-between align-items-center mb-3">
	      	
	      			@php
	        			$cartItems = DB::table('carts')
	                    			->where('cart_user_id', '=', Auth::user()->id)
	                    			->count('cart_product_id');
			        @endphp

			        <span class="text-muted">Tu carrito</span>
			        <span class="badge badge-secondary badge-pill">{{$cartItems}}</span>
			    </h4>
			    <div class="card mb-3" style="border: 0">

			      	@foreach($carts as $cart)

			        	@if($cart->cart_user_id == Auth::user()->id)

			                @foreach($products as $product)

			                    @if ($product->id == $cart->cart_product_id)

			        				<div class="list-group-item d-flex justify-content-between">
			          					<div>
			            					<h6 class="my-0">{{$product->product_name}}</h6>
			            
			            					@foreach($categories as $category)

			                                	@if($category->id == $product->category_id)

			            							<small class="text-muted">{{$category->category_name}}</small>

			           							 @endif
			            
			            					@endforeach
			          		
			          					</div>
			          					<span class="text-muted">{{$product->product_price}}<small>€</small> x{{$cart->product_quantity }}</span>
			        				</div>

								@endif

			                @endforeach

			            @endif

			        @endforeach

			        <div class="list-group-item d-flex justify-content-between bg-light">
			          <div class="text-success">
			            <h6 class="my-0">Descuento cupón</h6>
			            <small>EXAMPLECODE</small>
			          </div>
			          <span class="text-success">-$5</span>
			        </div>
			        <div class="list-group-item d-flex justify-content-between">
			          <span>Total</span>
			          <strong>{{ $total }}<small><b>€</b></small></strong>
	        		</div>
	      		</div>
    		</div>
		    <div class="col-md-8 order-md-1">
		      <h4 class="mb-3 text-muted">Dirección de envío</h4>
		      <form class="needs-validation" action="">
		        <div class="row">
		          <div class="col-md-6 mb-3">
		            <label for="firstName">Nombre</label>
		            <input type="text" class="form-control" id="firstName" placeholder="Introduce tu nombre" value="" required>
		            <div class="invalid-feedback">
		              Por favor, introduce tu nombre
		            </div>
		          </div>
		          <div class="col-md-6 mb-3">
		            <label for="lastName">Apellidos</label>
		            <input type="text" class="form-control" id="lastName" placeholder="Introduce tus apellidos" value="" required>
		            <div class="invalid-feedback">
		              Por favor, introduce tu apellido
		            </div>
		          </div>
		        </div>

		        <div class="mb-3">
		          <label for="username">Nickname</label>
		          <div class="input-group">
		            <div class="input-group-prepend">
		              <span class="input-group-text"><i class="fas fa-user"></i></span>
		            </div>
		            <input type="text" class="form-control" id="username" value="{{Auth::user()->name }}" readonly>
		          </div>
		        </div>

		        <div class="mb-3">
		          	<label for="email">Email</label>
		        	<div class="input-group">
		            	<div class="input-group-prepend">
		            		<span class="input-group-text"><i class="fas fa-envelope"></i></span>
		            	</div>
		          		<input type="email" class="form-control" id="email" value="{{Auth::user()->email }}" readonly>
		      		</div>
		        </div>

		        <div class="mb-3">
		          	<label for="address">Dirección</label>
		          	<div class="input-group">
		            	<div class="input-group-prepend">
		            		<span class="input-group-text"><i class="fas fa-home"></i></span>
		            	</div>
		          		<input type="text" class="form-control" id="address" placeholder="Tipo de calle, nombre, número" required>
		      		</div>
		         <div class="invalid-feedback">
		            Por favor, introduce tu dirección.
		          </div>
		        </div>

		        <div class="mb-3">
		          <label for="address2">Dirección 2 <span class="text-muted">(Opcional)</span></label>
		          	<div class="input-group">
		          		<div class="input-group-prepend">
		            		<span class="input-group-text"><i class="fas fa-home"></i></span>
		            	</div>
		          		<input type="text" class="form-control" id="address2" placeholder="Piso, letra">
		          	</div>
		        </div>

		        <div class="row">
		          <div class="col-md-5 mb-3">
		            <label for="country">País</label>
		            <select class="custom-select d-block w-100" id="pais" disabled>
		              <option value="España">España</option>
		            </select>
		          </div>
		          <div class="col-md-4 mb-3">
		            <label for="state">Provincia</label>
		            <select class="custom-select d-block w-100" id="provincia" required>
		              <option value="">Elige...</option>
		              <option value="A Coruña">A Coruña</option>
		              <option value="Álava">Álava</option>
		              <option value="Albacete">Albacete</option>
		              <option value="Alicante">Alicante</option>
		              <option value="Almería">Almería</option>
		              <option value="Asturias">Asturias</option>
		              <option value="Ávila">Ávila</option>
		              <option value="Badajoz">Badajoz</option>
		              <option value="Barcelona">Barcelona</option>
		              <option value="Burgos">Burgos</option>
		              <option value="Cáceres">Cáceres</option>
		              <option value="Cádiz">Cádiz</option>
		              <option value="Cantabria">Cantabria</option>
		              <option value="Castellón">Castellón</option>
		              <option value="Ciudad Real">Ciudad Real</option>
		              <option value="Córdoba">Córdoba</option>
		              <option value="Cuenca">Cuenca</option>
		              <option value="Girona">Girona</option>
		              <option value="Granada">Granada</option>
		              <option value="Guadalajara">Guadalajara</option>
		              <option value="Guipúzcoa">Guipúzcoa</option>
		              <option value="Huelva">Huelva</option>
		              <option value="Huesca">Huesca</option>
		              <option value="Islas Baleares">Islas Baleares</option>
		              <option value="Jaén">Jaén</option>
		              <option value="La Rioja">La Rioja</option>
		              <option value="Las Palmas">Las Palmas</option>
		              <option value="León">León</option>
		              <option value="Lleida">Lleida</option>
		              <option value="Lugo">Lugo</option>
		              <option value="Madrid">Madrid</option>
		              <option value="Málaga">Málaga</option>
		              <option value="Murcia">Murcia</option>
		              <option value="Navarra">Navarra</option>
		              <option value="Ourense">Ourense</option>
		              <option value="Palencia">Palencia</option>
		              <option value="Pontevedra">Pontevedra</option>
		              <option value="Salamanca">Salamanca</option>
		              <option value="Santa Cruz de Tenerife">Santa Cruz de Tenerife</option>
		              <option value="Segovia">Segovia</option>
		              <option value="Sevilla">Sevilla</option>
		              <option value="Soria">Soria</option>
		              <option value="Tarragona">Tarragona</option>
		              <option value="Teruel">Teruel</option>
		              <option value="Toledo">Toledo</option>
		              <option value="Valencia">Valencia</option>
		              <option value="Valladolid">Valladolid</option>
		              <option value="Vizcaya">Vizcaya</option>
		              <option value="Zamora">Zamora</option>
		              <option value="Zaragoza">Zaragoza</option>
		            </select>
		            <div class="invalid-feedback">
		              Por favor, elige una provincia.
		            </div>
		          </div>
		          <div class="col-md-3 mb-3">
		            <label for="zip">Código Postal</label>
		            <input type="text" class="form-control" id="c_postal" placeholder="Código Postal" required>
		            <div class="invalid-feedback">
		              Código Postal requerido.
		            </div>
		          </div>
		        </div>
		        <hr class="mb-4">
		        <h4 class="mb-3 text-muted">Método de pago</h4>
		        <div class="d-block my-3">
		          <div class="custom-control custom-radio">
		            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
		            <label class="custom-control-label" for="credit">Tarjeta de Crédito</label>
		          </div>
		          <div class="custom-control custom-radio">
		            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
		            <label class="custom-control-label" for="debit">Tarjeta de Débito</label>
		          </div>
		        </div>
		        <div class="row">
		          <div class="col-md-6 mb-3">
		            <label for="cc-name">Nombre en la tarjeta</label>
		            <input type="text" class="form-control" id="cc-name" placeholder="Nombre en la tarjeta" required>
		            <small class="text-muted">Nombre completo</small>
		            <div class="invalid-feedback">
		              Por favor, introduce el nombre de la tarjeta
		            </div>
		          </div>
		          <div class="col-md-6 mb-3">
		            <label for="cc-number">Número de la tarjeta</label>
		            <input type="text" class="form-control" id="cc-number" placeholder="Nº de la tarjeta" required>
		            <div class="invalid-feedback">
		              Por favor, introduce el número de la tarjeta
		            </div>
		          </div>
		        </div>
		        <div class="row">
		          <div class="col-md-3 mb-3">
		            <label for="cc-expiration">Caducidad</label>
		            <input type="text" class="form-control" id="cc-expiration" placeholder="MM/YY" required>
		            <div class="invalid-feedback">
		              Por favor, introduce la caducidad de la tarjeta
		            </div>
		          </div>
		          <div class="col-md-3 mb-3">
		            <label for="cc-cvv">CVV</label>
		            <input type="text" class="form-control" id="cc-cvv" placeholder="123" required>
		            <div class="invalid-feedback">
		              Por favor, introduce el código de seguridad
		            </div>
		          </div>
		        </div>
		        <hr class="mb-4">
		        <button class="btn btn-dark btn-lg btn-block" style="margin-bottom: 3em" type="submit"><i class="fas fa-truck"></i> Finalizar compra</button>
		      </form>
		    </div>
  		</div>
	</div>

@stop