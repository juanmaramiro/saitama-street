@extends('layouts.dashboardLayout')

@section('title')
	Añade una nueva Categoría
@stop

@section('content')

	<div class="row">
		<div class="col-lg-6">
			<div class="table-data__tool-left">
                <h3 class="title-5 m-b-35">Añade una nueva Categoría</h3>
            </div>
            <form action="{{ route('categories.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="category_name" class="control-label mb-1">Nombre Categoría</label>
                    <input id="category_name" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Introduce el nombre de la categoría" required>
                </div>
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        <i class="fas fa-plus-circle"></i>&nbsp;
                        <span>Añadir</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    
@stop