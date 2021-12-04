@extends('base.base')
@section('titulo')
Establecimientos
@endsection
@section('extraJS')
<script type="text/javascript" src="{{ asset('js/establecimiento.js') }}"></script>
@endsection
@section('contenido')
<h2 class="text-center">Administrar Establecimientos</h2>
<br />

<div class="panel panel-default">
	<div class="panel-heading">
		<ul>
			<button class="add-modal btn btn-primary"><span class="fas fa-plus">&nbsp;</span>Agregar Establecimiento</button>
		</ul>
	</div>
	<div class="panel-body">
		<table class="table table-hover" id="postTable">
			<thead class="thead-light">
				<tr>
					<th>ESTABLECIMIENTO</th>
					<th>ACCIONES</th>
				</tr>
				{{ csrf_field() }}
			</thead>
			<tbody>
				@if(count($establecimientos)<=0)
				<script type="text/javascript">
					window.onload = function() {
						toastr.clear();
						toastr.info('No hay establecimientos registrados', 'Información', {timeOut: 7000});
					};
				</script>
				@endif
				@foreach($establecimientos as $indexKey => $establecimiento)
				<tr class="itemEstablecimiento{{$establecimiento->id}}">
					<td>{{$establecimiento->nombre}}</td>
					<td>	
						<button class="edit-modal btn btn-info" data-id="{{$establecimiento->id}}" data-coordinacion="{{$establecimiento->nombre}}">
							<span class="fas fa-edit"></span>&nbsp;<!--Editar-->Editar</button>
							<button class="delete-modal btn btn-danger" data-id="{{$establecimiento->id}}" data-coordinacion="{{$establecimiento->nombre}}" value="Eliminar">
								<span class="fas fa-trash"></span>&nbsp;<!--Eliminar-->Eliminar</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!-- /.panel-body -->
		</div><!-- /.panel panel-default -->

		<!-- Modales para registrar, editar y eliminar-->
		@include('establecimiento.modal-registro-establecimiento')
		@include('establecimiento.modal-editar-establecimiento')
		@include('establecimiento.modal-eliminar-establecimiento')
		@endsection