@extends('base.base')
@section('titulo')
Selección de establecimiento
@endsection

@section('contenido')
<h2 class="text-center">Seleccionar médico</h2>
<br />

<div class="panel panel-default">

	<div class="panel-body">
		@if(count($establecimientos)<=0)
		<script type="text/javascript">
			window.onload = function() {
				toastr.clear();
				toastr.info('No hay médicos registrados', 'Información', {timeOut: 7000});
			};
		</script>
		@endif
			<div class="form-group">
				<label for="exampleFormControlSelect1">Seleccione el establecimiento para emitir recetas</label>
				<select class="form-control" id="exampleFormControlSelect1">
					<option value="" selected disabled>Seleccionar</option>
					@foreach($establecimientos as $indexKey => $establecimiento)
					<option value="{{$establecimiento->id}}">{{$establecimiento->nombre}}</option>
					@endforeach
				</select>
				<br>
				<input class="btn btn-primary" type="submit" value="Enviar">
			</div>
		</div><!-- /.panel-body -->
	</div><!-- /.panel panel-default -->

	@endsection