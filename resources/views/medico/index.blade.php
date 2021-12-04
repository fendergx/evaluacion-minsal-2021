@extends('base.base')
@section('titulo')
Médicos
@endsection

@section('contenido')
<h2 class="text-center">Ver médicos</h2>
<br />

<div class="panel panel-default">

	<div class="panel-body">
		<table class="table table-hover" id="postTable">
			<thead class="thead-light">
				<tr>
					<th>Apellidos</th>
					<th>Nombres</th>
					<th></th>
				</tr>
				{{ csrf_field() }}
			</thead>
			<tbody>
				@if(count($medicos)<=0)
				<script type="text/javascript">
					window.onload = function() {
						toastr.clear();
						toastr.info('No hay médicos registrados', 'Información', {timeOut: 7000});
					};
				</script>
				@endif
				@foreach($medicos as $indexKey => $medico)
				<tr class="itemMedico{{$medico->id}}">
					<td>{{$medico->apellidos}}</td>
					<td>{{$medico->nombres}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!-- /.panel-body -->
		</div><!-- /.panel panel-default -->

		@endsection