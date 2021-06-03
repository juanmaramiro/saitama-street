@extends('layouts.page')

@section('title')
  SaitamaStreet
@endsection

<link href="{{ asset('css/catallection.css') }}" rel="stylesheet">

@section('content')
  <main role="main">
    <div class="album bg-white">
      <div class="container">
        <div class="row">
      
          @foreach($products as $product)

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <span class="img-fluid"><img src="../../../storage/products_images/{{ $product->product_image }}" width="100%" style="" onclick="window.location='{{ url('product') }}/{{$product->id}}';"></span>
                  <div class="card-body">
                    <h5 class="card-title font-weight-bold" onclick="window.location='{{ url('product') }}/{{$product->id}}';">{{ $product->product_name }}</h5>
                      <div class="d-flex justify-content-between align-items-center">
                        
                          @guest

                          <div class="btn-group">
                            <input type="button" class="btn btn-success font-weight-bold text-light" value="{{ $product->product_price.'€' }}" disabled>

                            <button class="btn btn-outline-dark" type="button" title="Debes estar logueado para añadir productos al carrito" disabled><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                          </div>

                          @else

                          <div class="btn-group">
                            <input type="button" class="btn btn-danger font-weight-bold text-light" value="{{ $product->product_price.'€' }}" disabled>

                            <button class="btn btn-dark" type="button" onclick="event.preventDefault(); document.getElementById('add-cart-form-{{$product->id}}').submit();"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                          </div>
                        
                          <form id="add-cart-form-{{$product->id}}" action="{{ route('cart.store') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                              <input id="product_id" name="product_id" type="hidden" value="{{ $product->id }}">
                              <input id="product_quantity" name="product_quantity" type="hidden" value="1">
                              <input id="user_id" name="user_id" type="hidden" value="{{Auth::user()->id }}">
                          </form>

                          @endif
                        
                    </div>
                  </div>
              </div>
            </div>

          @endforeach

        </div>
      </div>
    </div>
  </main>
  
@endsection