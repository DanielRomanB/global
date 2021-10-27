@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center div_center ">
        <div class="col-md-8">
            <div class="overlay">
                <div class="card ">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sesion') }}" >
                        @csrf
                        <div class="form-group row">
                            <label for="ruc" class="col-md-4 col-form-label text-md-right">R.U.C</label>

                            <div class="col-md-6">
                                <input id="ruc" type="text" class="form-control @error('ruc') is-invalid @enderror" name="ruc" value="{{ old('ruc') }}" required autocomplete="ruc" autofocus>

                                @error('ruc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input id="password" type="password" hidden="" value="1" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>

                            {{-- </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
{{-- <style type="text/css">
    .card{
        /*top: 100%;*/
        margin: 30px;
        margin-top: 30px;
        margin-bottom: 30px;
    }
    .overlay{
        top: 100%;
        background-color: #8cb2d969;
        padding-top: 1px;
        padding-bottom: 1px;
        border-radius: 15px;
        border: 2px  grey solid;
        box-shadow: 10px 5px black ;
    }
    body{
         background-color: #d2d98c;
        }
</style> --}}
@endsection
