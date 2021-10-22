@extends('layout')

@section('contents')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	<div class="card-header">Listado de Empresas</div>
            	<div class="card-body">
            		<button class="btn btn-secondary">Agregar</button>
            		<br>
            		<table class="table table-bordered">
            			<thead>
            				<tr>
		        				<th>ID</th>
		        				<th>Nombre</th>
		        				<th>RUC</th>
		        				<th>URL</th>
		        				<th>Estado</th>
		        				<th>Editar</th>
		        				<th>Eliminar</th>
		        			</th>
            			</thead>
            			<tbody>
            				@foreach($empresas as $empresa)
            					<tr>
            						<td>{{$empresa->id}}</td>
            						<td>{{$empresa->name}}</td>
            						<td>{{$empresa->ruc}}</td>
            						<td>{{$empresa->url}}</td>
            						<td>
            							@if($empresa->estado == "1")
            								Activo
            							@else
            								Desactivo
            							@endif
            						</td>
            						<td><button class="btn btn-primary">Editar</button></td>
            						<td><button class="btn btn-danger">Eliminar</button></td>
            					</tr>
            				@endforeach
            			</tbody>
            		</table>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection