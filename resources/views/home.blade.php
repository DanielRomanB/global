@extends('layout')

@section('title', 'Sistema Facturacion')
@section('breadcrumb', 'Sistema Facturacion')
@section('breadcrumb2', 'Sistema Facturacion')
@section('data-toggle', 'modal')
@section('href_accion', '#modalagregar')
@section('value_accion', 'Agregar')
@section('button2', 'Inicio')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox ">
        <div class="ibox-content">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
               <thead>
                  <tr>
                    <th style="width: 8px;">Item</th>
                    <th>Nombre del bat</th>
                    <th>Funcion</th>
                    <th></th>
                </th>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Git Pull sistema</td>
                <td>Git Pull</td>
                <td> <a href="{{route('pull')}}" class="btn btn-info">Ejecutar</a></td>
            </tr>
           {{--  <tr>
                <td>1</td>
                <td>Git Pull sistema</td>
                <td>Git Pull</td>
                <td> <a href="{{route('pull')}}" class="btn btn-info">Ejecutar</a></td>
            </tr> --}}
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>
</div>
<style>
  .form-control{margin-top: 6px;}
  .btn.btn-info.btn-file{ background: #379ff900;border-color: #379ff900; color: black;}
  .fa.fa-check-circle{color: green;}
  .fa.fa-times-circle{color: red;}

</style>

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
<link href="{{ asset('css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>
<!-- switchery script -->
<link href="{{ asset('css/plugins/switchery/switchery.css') }}" rel="stylesheet">
<script src="{{ asset('js/plugins/switchery/switchery.js') }}"></script>


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
