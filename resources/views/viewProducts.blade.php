@extends('layouts.page')

@section('title')
	{{$product->product_name}}
@stop

<link href="{{ asset('css/viewProducts.css') }}" rel="stylesheet">

@section('content')

	<div class="container" style="margin-bottom: 2em">
		<div class="card">
			<div class="container-fluid">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<div class="preview-pic tab-content">
							 <div class="tab-pane active" id="pic-1"><img src="../../../storage/products_images/{{ $product->product_image }}" /></div>
						</div>
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">{{$product->product_name}}</h3>
						<div class="category">
								
							@foreach($categories as $category)

								@if($category->id == $product->category_id)

									<p class="text-danger font-weight-bold">{{$category->category_name}}</p>

								@endif

							@endforeach

						</div><br>
						<p class="product-description">{{$product->product_description}}</p>
						<div>
							<h4>{{$product->product_price}} €</h4>
						</div>
						<div>
							<label for="product_quantity" class="control-label mb-1">Cantidad</label>
							<input id="product_quantity" class="form-control" name="product_quantity" type="number" form="add-cart-form" value="1" min="1" style="width:4em">
						</div><br>
	              
						<div class="action">

							@if(Auth::user())

								<button class="btn btn-danger col-md-4" type="button" onclick="event.preventDefault(); document.getElementById('add-cart-form').submit();">
									<i class="fas fa-shopping-cart"></i> Añadir al carrito
								</button>
								<!-- Hidden form -->
								<form id="add-cart-form" action="{{ route('cart.store') }}" method="POST" style="display: none;">
	                        		{{ csrf_field() }}
	                        		<input id="product_id" name="product_id" type="hidden" value="{{$product->id }}">
	                        		<input id="user_id" name="user_id" type="hidden" value="{{Auth::user()->id }}">
	                    		</form>

							@else

								<button class="btn btn-outline-secondary col-md-4" type="button" disabled>
									<i class="fas fa-shopping-cart"></i> Añadir al carrito
								</button>
								<div>
									<small class="text-secondary font-italic">Debes estar logueado para añadir</small><br> 
								</div>

							@endif

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop