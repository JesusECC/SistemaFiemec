@extends('layouts.app')

@section('content')
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <span>
                        <img src="{{asset('img/LogoFiemecFinal.png')}}" style="margin-bottom: 30px;margin-left: 80px;">
                        </span>
                        <div class="wrap-input100 validate-input">
                            <input id="email" type="email" class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Ingrese Correo">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif                            
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <input id="password" type="password" class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Ingrese Contraseña">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>  
                        <div class="container-login100-form-btn">
                            <tr >
                               <th >
                                    <button type="submit" class="login100-form-btn" style="margin: 10px">
                                        Ingresar
                                    </button>
                                </th>
                            </tr>
                            <tr >
                                <th >
                                    <button type="reset" class="login100-form-btn" style="margin: 10px">
                                        Cancelar
                                    </button>
                                </th>
                            </tr>
                        </div>                              
                    </form>
@endsection
