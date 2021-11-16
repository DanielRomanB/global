@extends('layouts.app')
@section('content')
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <center><h3 class="letra">Introduzca R.U.C de Empresa</h3></center>
                @if($errors->any())
                <div class="alert alert-danger" style="margin-top: 10px;margin-bottom: 0px;">
                    <a class="alert-link" href="#" style="color:white;">
                        @foreach ($errors->all() as $error)
                        <li class="error" style="color: white;">{{ $error }}</li>
                        @endforeach
                    </a>
                </div>
                @endif
            </div>
            <div class="card-body"  >
                <form method="POST" action="{{ route('sesion') }}" >
                    @csrf
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-id-card" style="color:white;font-size: 25px;text-align: center;"></i></span>
                        </div>
                        <!-- <input type="text" class="form-control" placeholder="Nombre Usuario" > -->
                        <input  id="ruc" type="number" class="form-control @error('ruc') is-invalid @enderror" name="ruc" value="{{ old('ruc') }}"  placeholder="RUC" autocomplete="off">
                        @error('ruc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>



                    <center><div class="form-group " >
                        <!-- <input type="submit" value="Iniciar" class="btn  login_btn cwhite"> -->
                        <button type="submit" class=" btn login_btn cwhite">Ingresar</button><br>
                    </div></center>
                </form>
            </div>
        </div>
    </div>
</div>
<style type="text/css">

/*@import url('https://fonts.googleapis.com/css?family=Numans');
https://images2.alphacoders.com/361/thumb-1920-36170.jpg
*/

    html,body{
        background-image: url('{{ asset('/leonosoft.jpg')}}');
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Numans', sans-serif;
        }
        .pt-4, .py-4{
            padding-top: 12% !important;
        }
        .container{
            height: 100%;
            align-content: center;
        }
        .alert-danger {
            color: #04a50900;
            background-color: #d7d7d738;
            border-color: #1e1e1e00;
            padding: 4px 10px;
        }

        .card{
/*height: 370px;*/
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
    font-size: 60px;
    margin-left: 10px;
    color: #3F7B26;
}

.social_icon span:hover{
    color: white;
    cursor: pointer;
}

.card-header h3{
    color: white;
}

.social_icon{
    position: absolute;
    right: 20px;
    top: -45px;
}

.input-group-prepend span{
    width: 50px;
    background-color: #3F7B26;
    color: black;
    border:0 !important;
}

input:focus{
    outline: 0 0 0 0  !important;
    box-shadow: 0 0 0 0 !important;

}

.remember{
    color: white;
}

.remember input
{
    width: 15px;
    height: 15px;
    margin-left: 15px;
    margin-right: 5px;
}

.login_btn{
    color: black;
    background-color: #3F7B26;
    width: 100px;
}

.login_btn:hover{
    color: black;
    background-color: white;
}

.links{
    color: white;
}

.links a{
    margin-left: 4px;
}
.cwhite{
  color: white;
}
.letra{
    font-family: Arial, Helvetica, sans-serif;
}
</style>
@endsection
