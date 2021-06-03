@extends('layouts.dashboardLayout')

@section('title')
	Cupones
@stop

@section('content')

	<div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <h3 class="title-5 m-b-35">Listado de Cupones</h3>
                </div>
                <div class="table-data__tool-right">
                    <a href="{{ route('coupons.add') }}">
                        <button class="btn btn-info">
                            <i class="fas fa-plus-circle"></i> Nuevo cupón
                        </button>
                    </a>
                    <!--<a href="{{ url('admin/coupons/addCoupon') }}">
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
                            <th class="d-none d-md-table-cell">Nombre</th>
                            <th>Código</th>
                            <th>Valor</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($coupons as $coupon)

                        <tr class="tr-shadow">
                            <td class="d-none d-md-table-cell"></td>
                            <td class="d-none d-md-table-cell">{{ $coupon->coupon_name }}</td>
                            <td>{{ $coupon->coupon_code }}</td>
                            <td>{{ $coupon->coupon_value }}</td>
                            <td>              
                                <a href="{{ url('admin/coupons/editCoupon') }}_{{$coupon->id}}">
                                    <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Editar">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </a>
                                <a href="{{ url('admin/coupons/delete') }}_{{$coupon->id}}">
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