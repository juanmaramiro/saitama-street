@extends('layouts.page')

@section('title')
	Finalizando pedido
@stop

<link href="{{ asset('css/login.css') }}" rel="stylesheet">

@section('content')

	<div class="container" style="margin-bottom: 6em">
		<form id="spinner">
	        <div class="text-center">
	            <img class="mb-4 te" src="../../../storage/saitamalogo.png" alt="" width="80"><br>
	            <h2><b>Realizando<span class="text-danger"><i>Pedido</i></span></b></h2>
	        </div>

	        <div class="alert alert-light text-center align-middle mb-3" style="height: 160px">
	            
	            <img class="mb-4" src="../../../storage/spinner.gif" alt="" width="60" style="vertical-align: middle;"><br>
	            <h5>Estamos terminando de preparar tu envío, {{ Auth::user()->name }}.</h5>
	        </div>
	    </form>

		<form id="final" style="display: none">
	        <div class="text-center">
	            <img class="mb-4 te" src="../../../storage/saitamalogo.png" alt="" width="80"><br>
	            <h2><b>Pedido<span class="text-danger"><i>Finalizado</i></span></b></h2>
	        </div>
	        <div class="alert alert-light mb-3 text-center" style="height: 160px">
	            
	            <img class="mb-4" src="../../../storage/1200px-Check_green_icon.png" alt="" width="60" style="vertical-align: middle;"><br>
	            <h5 class="text-success">Enhorabuena, {{ Auth::user()->name }}, tu pedido se ha realizado correctamente.</h5>
	        </div>
	    </form>
	</div>

@stop

<script type="text/javascript">

	window.onload = hide;
	function hide(){
		
		var x = document.getElementById("spinner");
		var y = document.getElementById("final");

		setTimeout(function () {
			x.style.display = "none";
			y.style.display = "block";
		}, 7000);
	}

	/*let content = $('.final-text'),
            spinner = $('.spinner');

        $(document).ready(function () {
            setTimeout(function () {
                content.show();
                spinner.hide();
            }, 5000);
        });*/

</script>
	