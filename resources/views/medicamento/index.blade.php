@extends('base.base')
@section('titulo')
Medicamentos
@endsection

@section('contenido')
<h2 class="text-center">Ver medicamentos</h2>
<br />

<div class="panel panel-default">

	<div class="panel-body">
		<table class="table table-hover" id="postTable">
			<thead class="thead-light">
				<tr>	
					<th>MEDICAMENTO</th>
				</tr>
				{{ csrf_field() }}
			</thead>
			<tbody>
				@if(count($medicamentos)<=0)
				<script type="text/javascript">
					window.onload = function() {
						toastr.clear();
						toastr.info('No hay medicamentos registrados', 'Información', {timeOut: 7000});
					};
				</script>
				@endif
				@foreach($medicamentos as $indexKey => $medicamento)
				<tr class="itemMedicamento{{$medicamento->id}}">
					<td>{{$medicamento->nombre_medicamento}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!-- /.panel-body -->
		</div><!-- /.panel panel-default -->

		@endsection