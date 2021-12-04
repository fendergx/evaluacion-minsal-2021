@extends('base.base')
@section('titulo')
Recetas de medicos
@endsection

@section('contenido')
<h2 class="text-center">Recetas</h2>
<br />

<div class="panel panel-default">

	<div class="panel-body">
		<table class="table table-hover" id="postTable">
			<thead class="thead-light">
				<tr>
					<th>N°</th>
					<th>Establecimiento</th>
					<th>Médico</th>
					<th>Paciente</th>
					<th></th>
				</tr>
				{{ csrf_field() }}
			</thead>
			<tbody>
				@if(count($recetas)<=0)
				<script type="text/javascript">
					window.onload = function() {
						toastr.clear();
						toastr.info('No hay recetas registradas', 'Información', {timeOut: 7000});
					};
				</script>
				@endif
				@foreach($recetas as $indexKey => $receta)
				<tr class="itemReceta{{$receta->id}}">
					<td>{{$receta->numero}}</td>
					<td>{{$receta->establecimiento->nombre}}</td>
					<td>{{$receta->medico->nombres}} {{$receta->medico->apellidos}}</td>
					<td>{{$receta->paciente->nombres}} {{$receta->paciente->apellidos}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!-- /.panel-body -->
		</div><!-- /.panel panel-default -->

		@endsection