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
<div id="divmsg" class="divmsg"></div>
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
                <th>Nombre</th>
                <th>RUC</th>
                <th>Fecha Creacion</th>
                <th>estado</th>
                <th></th>
              </th>
            </thead>
            <tbody>
              @foreach($empresas as $empresa)
              <tr>
                <td>{{$empresa->id}}</td>
                <td>{{$empresa->name}}</td>
                <td>{{$empresa->ruc}}</td>
                <td>{{$empresa->created_at}}</td>
                <td>
                  @if($empresa->estado == "1")
                  Activo
                  @else
                  Desactivo
                  @endif
                </td>
                <td>@if($empresa->estado_duplicado == "1")<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModa{{$empresa->id}}"><i class="fa fa-cog"></i></button> @else <div id="countdown{{$empresa->id}}"></div>@endif</td>
                {{--   <td><button type="button" class='delete{{$empresa->id}} borrar e btn btn-danger'  > <i class="fa fa-trash" aria-hidden="true"></i> </button></td> --}}
              </tr>
              <div class="modal inmodal fade" id="myModa{{$empresa->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 10px;padding-top: 10px;">
                      <h4 class="modal-title">{{$empresa->name}} - RUC: {{$empresa->ruc}}</h4>
                    </div>
                    <div class="modal-body">
                      <form action="{{route('empresa.update',$empresa->id)}}"  enctype="multipart/form-data" method="post">@csrf @method('PATCH')
                        <div class="row">
                          <div class="col-lg-6 ">
                            <div class="form-group">
                              <label style="margin-bottom: 1px;">Nombre Empresa:</label>
                              <input type="text" value="{{$empresa->name}}" name="nombre_empresa" class="form-control" required >
                            </div>
                          </div>
                          <div class="col-lg-6">
                           <div class="form-group">
                            <label style="margin-bottom: 1px;">R.U.C:</label>
                            <input type="text" class="form-control" value="{{$empresa->ruc}}" disabled>
                          </div>
                        </div>
                        <div class="col-lg-6">
                         <div class="form-group">
                          <label style="margin-bottom: 1px;">Nombre de Usuario (Sunat):</label>
                          <input type="text" class="form-control" name="nombre_usuario_sunat" placeholder="Usuario Secundario" value="{{$empresa->usuario_sunat}}" >
                        </div>
                      </div>
                      <div class="col-lg-6">
                       <div class="form-group">
                        <label style="margin-bottom: 1px;">Contraseña de Usuario (Sunat):</label>
                        <input type="text" class="form-control" placeholder="*******"  name="psw_usuario_sunat" value="{{$empresa->contrasena_sunat}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                     <div class="form-group">
                      <label style="margin-bottom: 5px;">Certificado (Sunat):</label><br>
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Selecciona Archivo .P12</span><span class="fileinput-exists">Cambiar</span><input type="file" name="certificado"></span>
                        <span class="fileinput-filename"></span>
                        <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                      </div>
                      {{-- <input type="file" class="form-control"  value="{{$empresa->contrasena_sunat}}"> --}}
                    </div>
                  </div>
                  <div class="col-lg-6">
                   <div class="form-group">
                    <label style="margin-bottom: 1px;">Contraseña de Certificado (Sunat):</label>
                    <input type="text" class="form-control" name="psw_certificado" placeholder="*******"  value="{{$empresa->contrasena_sunat}}">
                  </div>
                </div>
                <div class="col-lg-12" align="right">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

              </div>
            </form>
          </div>



        </div>
      </div>
    </div>
    @endforeach

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
  .btn.btn-default.btn-file{ background: #379ff969;color: black;}
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
<link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>


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
  minutoSumar =2;
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
      document.getElementById('countdown{{$empresa->id}}').innerHTML = '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModa{{$empresa->id}}"><i class="fa fa-cog"></i></button>';
      // alert("terminó");

      return;
    }
    var minutes = Math.floor(distance / _minute) ;
    var seconds = Math.floor((distance % _minute) / _second);

    if (minutes>0) {
      document.getElementById('countdown{{$empresa->id}}').innerHTML = minutes + 'min ';
    }else{document.getElementById('countdown{{$empresa->id}}').innerHTML = '';
  }
  document.getElementById('countdown{{$empresa->id}}').innerHTML += seconds + 'seg'  ;
}

timer{{$empresa->id}} = setInterval(showRemaining{{$empresa->id}}, 1000) ;
</script>

@endforeach
<script type="text/javascript">
 $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

 @foreach($empresas as $empresa)
 $(".delete{{$empresa->id}}").click(function(e){
  e.preventDefault();
  var accion = 'delete';
  $.ajax({
    type:'PUT',
    url:"{{ route('empresa.update', $empresa->id) }}",
    data:{accion:accion},
    success:function(data){
      mostrarMensaje(data.mensaje);
    }
  });
});
 @endforeach
 function mostrarMensaje(mensaje){
       $("#divmsg").empty(); //limpiar div
       $("#divmsg").append(mensaje);
       $("#divmsg").show(200);
       $("#divmsg").hide(3000);
     }
   </script>

   @endsection
