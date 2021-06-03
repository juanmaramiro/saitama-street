@extends('layouts.dashboardLayout')

@section('title')
	Usuarios
@stop

@section('content')

	<div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <h3 class="title-5 m-b-35">Listado de Usuarios</h3>
                </div>
                <div class="table-data__tool-right">
                    <!--<a href="{{ url('admin/addCategory') }}">
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
                            <th>Email</th>
                            <th>Rol</th>
                        </tr>
                    </thead>
                    <tbody>

                         @foreach($users as $user)
                                            
                            <tr class="tr-shadow">
                                <td class="d-none d-md-table-cell"></td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <span class="block-email">{{ $user->email }}</span>
                                </td>
                                                
                                @if($user->admin == 1)
                                                
                                    <td><span class="role member">Admin</span></td>
                                                
                                @else
                                                
                                    <td><span class="role user">User</span></td>
                                                
                                @endif
                                            
                            </tr>
                                            
                        @endforeach
                                        
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
    
@stop