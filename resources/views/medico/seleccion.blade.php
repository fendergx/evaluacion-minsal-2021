	@extends('base.base')
@section('titulo')
Selección de médico
@endsection

@section('contenido')
<h2 class="text-center">Seleccionar médico</h2>
<br />

<div class="panel panel-default">

	<div class="panel-body">
		@if(count($medicos)<=0)
		<script type="text/javascript">
			window.onload = function() {
				toastr.clear();
				toastr.info('No hay médicos registrados', 'Información', {timeOut: 7000});
			};
		</script>
		@endif
		<form  method="post">
			<div class="form-group">
				<label for="exampleFormControlSelect1">Seleccione el médico para emitir recetas</label>
				<select class="form-control" id="id">
					<option value="" selected disabled>Seleccionar</option>
					@foreach($medicos as $indexKey => $medico)
					<option value="{{$medico->id}}">{{$medico->apellidos}}, {{$medico->nombres}}</option>
					@endforeach
				</select>
				<br>
				<input class="btn btn-primary" type="submit" value="Enviar">
			</div>
		</form>
		</div><!-- /.panel-body -->
	</div><!-- /.panel panel-default -->

	@endsection