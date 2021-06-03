@extends('layouts.dashboardLayout')

@section('title')
	Añade un nuevo cupón
@stop

@section('content')

	<div class="row">
		<div class="col-lg-6">
			<div class="table-data__tool-left">
                <h3 class="title-5 m-b-35">Añade un nuevo Cupón</h3>
            </div>
            <form action="{{ route('coupons.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="coupon_name" class="control-label mb-1">Nombre del cupón</label>
                    <input id="coupon_name" name="coupon_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Introduce el nombre del cupón" required>
                </div>
                <div class="form-group">
                    <label for="coupon_code" class="control-label mb-1">Código del cupón</label>
                    <input id="coupon_code" name="coupon_code" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Introduce el código del cupón" required>
                </div>
                <div class="form-group">
                    <label for="coupon_value" class="control-label mb-1">Valor del cupón</label>
                    <input id="coupon_value" name="coupon_value" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Introduce el valor del cupón" required>
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