@extends('layouts.app')
@section('content')

<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <center><h2>WOLKE</h2></center>
            <div class="card-header">
                <center><h3 class="letra">Introduzca R.U.C de Empresa</h3></center>
                @if($errors->any())
                <div class="alert alert-danger" style="margin-top: 10px;margin-bottom: 0px;">
                    <span class="alert-link"  style="color:white;">
                        @foreach ($errors->all() as $error)
                        <li class="error" style="color: white;">{{ $error }}</li>
                        @endforeach
                    </span>
                </div>
                @endif
            </div>
            <div class="card-body"  >
                <form method="POST" action="{{ route('sesion_wolke') }}" >
                    @csrf
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-id-card" style="color:white;font-size: 25px;text-align: center;"></i></span>
                        </div>
                        <!-- <input type="text" class="form-control" placeholder="Nombre Usuario" > -->
                        <input  id="ruc" type="number" class="form-control @error('ruc') is-invalid @enderror" name="ruc" value="{{ old('ruc') }}"  placeholder="RUC" autocomplete="off" maxlength="11" required="">
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
@endsection