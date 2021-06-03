@extends('layouts.dashboardLayout')

@section('title')
	Editar producto
@stop

@section('content')
	<div class="row">
		<div class="col-lg-6">
			<div class="table-data__tool-left">
                <h3 class="title-5 m-b-35">Edita el producto ({{$product->product_name}})</h3>
            </div>
            <form action="{{ url('admin/products/update') }}/{{$product->id}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="product_name" class="control-label mb-1">Nombre del producto</label>
                    <input id="product_name" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Introduce el nombre del producto" value="{{ $product->product_name }}" required>
                </div>
                <div class="form-group">
                    <label for="product_description" class="control-label mb-1">Descripción del producto</label>
                    <textarea id="product_description" name="product_description" class="form-control" rows="4" aria-required="true" aria-invalid="false" placeholder="Introduce la descripción del producto">{{ $product->product_description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="product_price" class="control-label mb-1">Precio del producto</label>
                    <input id="product_price" name="product_price" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Introduce el precio del producto" value="{{ $product->product_price }}" required>
                </div>
            
                <div class="form-group">
                    <label for="category">Categoría del producto</label>
                    <select id="product_category" name="product_category" class="form-control">

                        @foreach ($categories as $category)

                                
                            @if ($category->id == $product->category_id)

                                <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>

                            @else

                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                            @endif
                            
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="product_image">Imagen actual del producto</label><br>
                    <img src="../../../storage/products_images/{{ $product->product_image }}" title="{{ $product->product_image }}" width="100px">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control-file" id="product_image" name="product_image" accept="image/*">
                </div>
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block">
                        <i class="fas fa-pencil-alt"></i>&nbsp;
                        <span id="payment-button-amount">Editar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop