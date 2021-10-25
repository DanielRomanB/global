@extends('layout')

@section('contents')
<!-- Modal -->
<div class="modal fade" id="modalagregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{route('empresa.store')}}" enctype="multipart/form-data" method="post">
          @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<div class="row">
        		<div class="col-md-2">
        			<span>Nombre</span>
        		</div>
        		<div class="col-md-10">
        			<input type="text" class="form-control" autocomplete="off" name="nombre">
        		</div>
        	</div>
          <br>
          <div class="row">
            <div class="col-md-2">
              <span>RUC</span>
            </div>
            <div class="col-md-10">
              <input type="" class="form-control" autocomplete="off" name="ruc">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-2">
              <span>Estado</span>
            </div>
            <div class="col-md-10">
              <div class="form-check form-switch">
              <input class="form-check-input chack" type="checkbox" name="checkbox" id="check" checked>
            </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
    </form>
  </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	<div class="card-header">Listado de Empresas</div>
            	<div class="card-body">
            		<div class="row">
            				<div class="col-lg-12">
            					<button type="button" data-toggle="modal" data-target="#modalagregar" class="btn btn-secondary">Agregar</button>
            				</div>
            		</div>
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
<style type="text/css">
  .form-check-input.chack{
    height: 25px;
    width: 50px;
    margin-left: 0px;
  }
  .form-check.form-switch{
    padding: 0;
  }
</style>
@endsection