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
                <th></th>
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
                <td><button class="btn btn-primary"></button><div id="countdown{{$empresa->id}}"></div></td>
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

@foreach($empresas as $empresa)
<script>
  var end{{$empresa->id}} = new Date("{{$empresa->created_at}}");
  minutoSumar =4;
  end{{$empresa->id}}.setMinutes( end{{$empresa->id}}.getMinutes() + minutoSumar);
  var _second = 1000;
  var _minute = _second * 60;
  var timer{{$empresa->id}};

  function showRemaining{{$empresa->id}}() {
    var now{{$empresa->id}} =  Date.now();
    // alert(now);
    var distance = end{{$empresa->id}} - now{{$empresa->id}};
    if (distance < 0) {

      clearInterval(timer{{$empresa->id}});
      document.getElementById('countdown{{$empresa->id}}').innerHTML = 'Terminado!';
      // alert("terminó");

      return;
    }
    var minutes = Math.floor(distance / _minute) ;
    var seconds = Math.floor((distance % _minute) / _second);

    if (minutes>0) {
      document.getElementById('countdown{{$empresa->id}}').innerHTML = minutes + ' min ';
    }else{document.getElementById('countdown{{$empresa->id}}').innerHTML = '';
  }
  document.getElementById('countdown{{$empresa->id}}').innerHTML += seconds + ' seg'  ;
}

timer{{$empresa->id}} = setInterval(showRemaining{{$empresa->id}}, 1000) ;
</script>

@endforeach

@endsection
