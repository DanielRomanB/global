@extends('layout')

@section('title', 'Adm. Empresa')
@section('breadcrumb', 'Adm. Empresa')
@section('breadcrumb2', 'Adm. Empresa')
@section('data-toggle', 'modal')
@section('href_accion', '#modalagregar')
@section('value_accion', 'Agregar')
@section('button2', 'Inicio')

@section('content')
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
{{--  --}}
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox ">
        <div class="ibox-content">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
             <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>RUC</th>
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
</div>
<style>.form-control{margin-top: 6px;}</style>

<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Custom and plugin javascript -->
<script src="{{ asset('js/inspinia.js') }}"></script>
<script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>


<!-- Page-Level Scripts -->
<script>
  $(document).ready(function(){
    $('.dataTables-example').DataTable({
      pageLength: 25,
      responsive: true,
      dom: '<"html5buttons"B>lTfgitp',
      buttons: []
    });
  });
</script>

@endsection
