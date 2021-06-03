@extends('layouts.dashboardLayout')

@section('title')
	Productos
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <h3 class="title-5 m-b-35">Listado de Productos</h3>
                </div>
                <div class="table-data__tool-right">
                    <a href="{{ url('admin/products/addProduct') }}">
                        <button class="btn btn-info">
                            <i class="fas fa-plus-circle"></i> Nuevo Producto
                        </button>
                    </a>
                    <!--<a href="{{ url('admin/categories/addCategory') }}">
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

                        @foreach($products as $product)

                        <tr class="tr-shadow">
                            <td class="d-none d-md-table-cell"></td>
                            <td>{{ $product->product_name }}</td>
                            <td class="d-none d-md-table-cell">{{ $product->product_price }}</td>

                            @foreach($categories as $category)
                          
                                @if($product->category_id == $category->id)

                                    <td class="d-none d-md-table-cell">{{ $category->category_name }}</td>

                                @endif

                            @endforeach

                            <td class="d-none d-md-table-cell"><img src="../../../storage/products_images/{{ $product->product_image }}" width="50" height="50"></td>
                            <td>              
                                <a href="{{ url('admin/products/editProduct') }}_{{$product->id}}">
                                    <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Editar">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </a>
                                <a href="{{ url('admin/products/delete') }}_{{$product->id}}">
                                    <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </a>                
                            </td>
                        </tr>

                        @endforeach
                                            
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
@stop