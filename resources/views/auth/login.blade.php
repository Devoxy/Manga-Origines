@extends('template.auth')

@section('title', 'Connexion')

@section('content')
<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">

    <img src="/images/static/logo.png" alt="Manga Origine" class="logo">

    <form class="login100-form validate-form flex-sb flex-w" method="post" route="{{ route('login') }}">

        @csrf

        <span class="login100-form-title p-b-53">
            Connexion
        </span>

        <a href="#" class="btn-face m-b-20">
            <i class="fa fa-facebook-official"></i>
            Facebook
        </a>

        <a href="#" class="btn-google m-b-20">
            <img src="/auth/images/icons/icon-google.png" alt="GOOGLE">
            Google
        </a>
        
        <div class="p-t-31 p-b-9">
            <span class="txt1">
                Email
            </span>
        </div>
        <div class="wrap-input100">
            <input class="input100 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}">
            <span class="focus-input100"></span>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="p-t-13 p-b-9">
            <span class="txt1">
                Mot de passe
            </span>

            <a href="{{ route('password.request') }}" class="txt2 bo1 m-l-5">
                Mot de passe oublié ?
            </a>
        </div>
        <div class="wrap-input100">
            <input class="input100 @error('password') is-invalid @enderror" type="password" name="password">
            <span class="focus-input100"></span>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="container-login100-form-btn m-t-17">
            <button type="submit" class="login100-form-btn">
                Connexion
            </button>
        </div>

        <div class="w-full text-center p-t-55">
            <span class="txt2">
                Vous n'avez pas de compte ?
            </span>

            <a href="{{ route('register') }}" class="txt2 bo1">
                Inscrivez-vous
            </a>
        </div>
    </form>
</div>
@endsection
