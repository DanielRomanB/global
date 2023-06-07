 @extends('layout')

@section('title', 'Sistema Facturacion')
@section('breadcrumb', 'Sistema Facturacion')
@section('breadcrumb2', 'Sistema Facturacion')
@section('data-toggle', 'modal')
@section('href_accion', '#modalagregar')
@section('value_accion', 'Agregar')
@section('button2', 'Inicio')

@section('content')
  @if ($errors->any())
      <div class="alert alert-danger" style="margin-top: 10px;margin-bottom: 0px;">
          <a class="alert-link" href="#">
              @foreach ($errors->all() as $error)
                  <li class="error" style="color: red">{{ $error }}</li>
              @endforeach
          </a>
      </div>
  @endif
  <div class="modal fade" id="modalagregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <form action="{{ route('sis_facturacion.store') }}" enctype="multipart/form-data" method="post">
              @csrf
              <div class="modal-content">
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-md-12">
                              <p><b>Nota: Asegurese que el N° R.U.C sea correcto</b></p>
                          </div>
                          <div class="col-lg-12">
                              <div class="form-group">
                                  <label style="margin-bottom: 1px;">Nombre*</label>
                                  <input type="text" class="form-control" autocomplete="off" required name="nombre">
                              </div>
                          </div>
                          <div class="col-lg-12">
                              <div class="form-group">
                                  <label style="margin-bottom: 1px;">RUC*</label>
                                  <input type="text" class="form-control" autocomplete="off"
                                      onkeyup="this.value=Numeros(this.value)" name="ruc" required=""
                                      maxlength="11" minlength="11">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
  <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
          <div class="col-lg-12">
              <div class="ibox ">
                  <div class="ibox-content">
                      <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover dataTables-example">
                              <thead>
                                  <tr>
                                      <th style="width: 8px;">Item</th>
                                      <th>Nombre</th>
                                      <th>RUC</th>
                                      <th>Descripcion</th>
                                      <th>Fecha Creacion</th>
                                      <th>estado</th>
                                      <th></th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($sis_facturacion as $sis_facturacions)
                                      <tr>
                                          <td>{{ $sis_facturacions->id }}</td>
                                          <td>{{ $sis_facturacions->name }}</td>
                                          <td>{{ $sis_facturacions->ruc }}</td>
                                          <td>{{ $sis_facturacions->descripcion }}</td>
                                          <td>{{ $sis_facturacions->created_at }}</td>
                                          <td>
                                              @if ($sis_facturacions->estado == '1')
                                                  Activo
                                              @else
                                                  Desactivo
                                              @endif
                                          </td>
                                          <td>
                                                @if(session()->has('message'))
                                                    <div id="countdown{{ $sis_facturacions->id }}"></div>
                                                @else
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#myModa{{ $sis_facturacions->id }}"><i
                                                        class="fa fa-cog"></i></button>  
                                                @endif
                                          </td>
                                          <td align="center">
                                              <a href="http://jypsac.dyndns.org:190/facturacion_{{ $sis_facturacions->ruc }}/public"
                                                  style="color: #15151894;" target="_blank">
                                                  <i class="fa fa-external-link-square"
                                                      style="font-size:20px !important;"></i>
                                              </a>
                                          </td>
                                      </tr>
                                      <div class="modal inmodal fade" id="myModa{{ $sis_facturacions->id }}"
                                          tabindex="-1" role="dialog" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                  <div class=" row"
                                                      style="padding-bottom: 10px;padding-top: 10px; padding-right: 5px;">
                                                      <div class="col-lg-10" align="center">
                                                          <h1><b>{{ $sis_facturacions->name }}</b></h1>
                                                      </div>
                                                      <div class="col-lg-2" align="right">
                                                          @if (
                                                              $sis_facturacions->certificado !== null &&
                                                                  $sis_facturacions->usuario_sunat !== null &&
                                                                  $sis_facturacions->contrasena_sunat !== null &&
                                                                  $sis_facturacions->contrasena_certi !== null &&
                                                                  $sis_facturacions->estado_migracion_bd == 1)
                                                              @if ($sis_facturacions->estado == 0)
                                                                  <input type="checkbox"
                                                                      class="js-switch_2{{ $sis_facturacions->id }}" onchange="ajax_setup({{ $sis_facturacions->id }}),eliminar({{ $sis_facturacions->id }})"/>
                                                              @else
                                                                  <input type="checkbox"
                                                                      class="js-switch_2{{ $sis_facturacions->id }}"
                                                                      checked onchange="ajax_setup({{ $sis_facturacions->id }}),eliminar({{ $sis_facturacions->id }})"/>
                                                              @endif
                                                          
                                                          @else
                                                            <input type="checkbox"
                                                                      class="js-switch_2{{ $sis_facturacions->id }}"
                                                                      disabled />
                                                          @endif
                                                      </div>
                                                  </div>
                                                  <div class="modal-body">
                                                      <form
                                                          action="{{ route('sis_facturacion.update', $sis_facturacions->id) }}"
                                                          enctype="multipart/form-data" method="post">
                                                          @csrf
                                                          @method('PATCH')
                                                          <div class="row">
                                                              <div class="col-lg-12">
                                                                  <div id="divmsg{{ $sis_facturacions->id }}"></div>
                                                              </div>
                                                              <div class="col-lg-9 row">
                                                                  <div class="col-lg-6 ">
                                                                      <div class="form-group">
                                                                          <label style="margin-bottom: 1px;">Nombre
                                                                              Empresa:</label>
                                                                          <input type="text"
                                                                              value="{{ $sis_facturacions->name }}"
                                                                              name="nombre_empresa" class="form-control"
                                                                              required>
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-lg-6">
                                                                      <div class="form-group">
                                                                          <label
                                                                              style="margin-bottom: 1px;">R.U.C:</label>
                                                                          <input type="text" class="form-control"
                                                                              value="{{ $sis_facturacions->ruc }}"
                                                                              disabled>
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-lg-12">
                                                                      <h3>Comprobantes Electronicos</h3>
                                                                  </div>
                                                                  <div class="col-lg-6">
                                                                      <div class="form-group">
                                                                          <label style="margin-bottom: 1px;">Nombre de
                                                                              Usuario (Sunat):</label>
                                                                          <input type="text" class="form-control"
                                                                              name="nombre_usuario_sunat"
                                                                              placeholder="Usuario Secundario"
                                                                              value="{{ $sis_facturacions->usuario_sunat }}">
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-lg-6">
                                                                      <div class="form-group">
                                                                          <label style="margin-bottom: 1px;">Contraseña
                                                                              de Usuario (Sunat):</label>
                                                                          <input type="text" class="form-control"
                                                                              placeholder="*******"
                                                                              name="psw_usuario_sunat"
                                                                              value="{{ $sis_facturacions->contrasena_sunat }}">
                                                                      </div>

                                                                  </div>
                                                                  <div class="col-lg-12">
                                                                      <h3>API - GUIA DE REMISION</h3>
                                                                  </div>
                                                                  <div class="col-lg-12">
                                                                      <div class="form-group">
                                                                          <label style="margin-bottom: 1px;">API
                                                                              ID:</label>
                                                                          <input type="text" class="form-control"
                                                                              name="api_id_guia" value="{{$sis_facturacions->api_remision_id}}">
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-lg-12">
                                                                      <div class="form-group">
                                                                          <label style="margin-bottom: 1px;">API
                                                                              CLAVE:</label>
                                                                          <input type="text" class="form-control"
                                                                              name="api_clave_guia" value="{{$sis_facturacions->api_remision_key}}">
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-lg-6">
                                                                      <div class="form-group">
                                                                          <label style="margin-bottom: 5px;">Certificado
                                                                              (Sunat):</label><br>
                                                                          <center>
                                                                              <div class="fileinput fileinput-new"
                                                                                  data-provides="fileinput">
                                                                                  <span class="btn btn-info btn-file">
                                                                                      <span class="fileinput-new"><img
                                                                                              src="{{ asset('certi.png') }}"
                                                                                              width="50px"
                                                                                              alt=""></span>
                                                                                      <span class="fileinput-exists"><img
                                                                                              src="{{ asset('certi.png') }}"
                                                                                              width="50px"
                                                                                              alt=""></span>
                                                                                      <input type="file"
                                                                                          name="certificado">
                                                                                  </span>
                                                                                  <span class="fileinput-filename">
                                                                                  </span>
                                                                                  <a href="#"
                                                                                      class="close fileinput-exists"
                                                                                      data-dismiss="fileinput"
                                                                                      style="float: none">&times;</a>
                                                                              </div>
                                                                      </div>
                                                                  </div>

                                                                  <div class="col-lg-6">
                                                                      <div class="form-group">
                                                                          <label style="margin-bottom: 1px;">Contraseña
                                                                              de Certificado (Sunat):</label>
                                                                          <input type="text" class="form-control"
                                                                              name="psw_certificado"
                                                                              placeholder="*******"
                                                                              value="{{ $sis_facturacions->contrasena_certi }}">
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-lg-12">
                                                                      <div class="form-group">
                                                                          <label
                                                                              style="margin-bottom: 1px;">Descripcion:</label>
                                                                          <textarea name="descripcion" class="form-control">{{ $sis_facturacions->descripcion }}</textarea>
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-lg-12" align="center">
                                                                      <button type="submit"
                                                                          class="btn btn-primary">Guardar</button>
                                                                  </div>
                                                              </div>
                                                              <div class="col-lg-3 "
                                                                  style="border-left:1px solid grey;margin-left: 5px;">
                                                                  <div class=" row">
                                                                      <div class="col-sm-12" style="padding-bottom:5px">
                                                                          <b><i> Se debe cumplir el llenado del todos los
                                                                                  campos para que la sis_facturacions
                                                                                  pueda ser Activado.</i></b>
                                                                      </div>
                                                                      <div class="col-sm-10"><label>Documento Certificado
                                                                          </label></div>
                                                                      <div class="col-sm-2"><i
                                                                              @if (isset($sis_facturacions->certificado)) class="fa fa-check-circle" @else class="fa fa-times-circle" @endif></i>
                                                                      </div>
                                                                      <div class="col-sm-10"><label>Contraseña del
                                                                              Certificado </label></div>
                                                                      <div class="col-sm-2"><i
                                                                              @if (isset($sis_facturacions->contrasena_certi)) class="fa fa-check-circle" @else class="fa fa-times-circle" @endif></i>
                                                                      </div>
                                                                      <div class="col-sm-10"><label>Usuario de Sunat
                                                                          </label></div>
                                                                      <div class="col-sm-2"><i
                                                                              @if (isset($sis_facturacions->usuario_sunat)) class="fa fa-check-circle" @else class="fa fa-times-circle" @endif></i>
                                                                      </div>
                                                                      <div class="col-sm-10"><label>contraseña de Sunat
                                                                          </label></div>
                                                                      <div class="col-sm-2"><i
                                                                              @if (isset($sis_facturacions->contrasena_sunat)) class="fa fa-check-circle" @else class="fa fa-times-circle" @endif></i>
                                                                      </div>
                                                                      <div class="col-sm-10"><label>Migracion de Base de
                                                                              Datos</label></div>
                                                                      <div class="col-sm-2"><i
                                                                              @if ($sis_facturacions->estado_migracion_bd == 1) class="fa fa-check-circle" @else class="fa fa-times-circle" @endif></i>
                                                                      </div>
                                                                  </div>
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
      .form-control {
          margin-top: 6px;
      }

      .btn.btn-info.btn-file {
          background: #379ff900;
          border-color: #379ff900;
          color: black;
      }

      .fa.fa-check-circle {
          color: green;
      }

      .fa.fa-times-circle {
          color: red;
      }
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
  @foreach ($sis_facturacion as $sis_facturacions2)
        <script>
            var elem_2 = document.querySelector('.js-switch_2{{ $sis_facturacions2->id }}');
            var switchery_2 = new Switchery(elem_2, {
                color: 'green'
            });
            function eliminar(){
                switchery_2.destroy();
            }
        </script>
  @endforeach
  <script>
      function Numeros(string) { //Solo numeros
          var out = '';
          var filtro = '0123456789'; //Caracteres validos

          //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos
          for (var i = 0; i < string.length; i++)
              if (filtro.indexOf(string.charAt(i)) != -1)
                  //Se añaden a la salida los caracteres validos
                  out += string.charAt(i);

          //Retornar valor filtrado
          return out;
      }
  </script>
  <!-- Page-Level Scripts -->
  <script>
      $(document).ready(function() {
          $('.dataTables-example').DataTable({
              pageLength: 25,
              responsive: true,
              dom: '<"html5buttons"B>lTfgitp',
              buttons: []
          });
      });
  </script>

    @if(session()->has('message'))
    @foreach ($sis_facturacion as $sis_facturacions3)
    <script>
        var end{{ $sis_facturacions3->id }} = new Date("{{ $sis_facturacions3->created_at }}");
        minutoSumar = 2;
        end{{ $sis_facturacions3->id }}.setMinutes(end{{ $sis_facturacions3->id }}.getMinutes() + minutoSumar);
        var _second = 1000;
        var _minute = _second * 60;
        var timer{{ $sis_facturacions3->id }};

        function showRemaining{{ $sis_facturacions3->id }}() {
            var now{{ $sis_facturacions3->id }} = Date.now();
            // alert(now);
            var distance = end{{ $sis_facturacions3->id }} - now{{ $sis_facturacions3->id }};
            if (distance < 0) {

                clearInterval(timer{{ $sis_facturacions3->id }});
                document.getElementById('countdown{{ $sis_facturacions3->id }}').innerHTML =
                    '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModa{{ $sis_facturacions3->id }}"><i class="fa fa-cog"></i></button>';
                // alert("terminó");

                return;
            }
            var minutes = Math.floor(distance / _minute);
            var seconds = Math.floor((distance % _minute) / _second);

            if (minutes > 0) {
                document.getElementById('countdown{{ $sis_facturacions3->id }}').innerHTML = minutes + 'min ';
            } else {
                document.getElementById('countdown{{ $sis_facturacions3->id }}').innerHTML = '';
            }
            document.getElementById('countdown{{ $sis_facturacions3->id }}').innerHTML += seconds + 'seg';
        }

        timer{{ $sis_facturacions3->id }} = setInterval(showRemaining{{ $sis_facturacions3->id }}, 1000);
    </script>
    @endforeach 
   @endif
  <script type="text/javascript">
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    function ajax_setup(id){
        var accion = id;
        
        switchery_2.disable();
        setTimeout(function() {   
            switchery_2.enable();
        }, 7000);
        $.ajax({
            type: 'post',
            url: "{{ route('sis_facturacion.estado') }}",
            data: {
                accion: accion
            },
            success: function(data) {
                $("#divmsg"+accion).empty(); //limpiar div
                $("#divmsg"+accion).append(data.mensaje);
                $("#divmsg"+accion).show(200);
                
                
            }
        });
    }
  </script>

@endsection
