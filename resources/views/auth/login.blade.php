@extends('layouts.app')

@include('resources.backgrounds')

<?php
    $header = [
        'style' => 'background-image:url(' . Background::$dashboard . ')',
        'class' => 'header-color header-dashboard',
        'title' => 'Logga in',
        'color' => 'white'
    ]; 

    $nav = [
        'color' => 'white',
        'class' => ''
    ];
?>

@section('content')
    
    <div id="form-main">
        <div id="form-div">
            <form class="form" id="form1" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf

                <p class="name">
                    <input placeholder="E-mailadress" id="email" type="email" class="feedback-input{{ $errors->has('email') ? ' is-invalid' : '' }}"
                    name="email" value="{{ old('email') }}" required autofocus>
                </p>
                            
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <p class="text">
                    <input placeholder="Lösenord" id="password" type="password" class="feedback-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                </p>
                            
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <p style="padding:2rem; padding-left:0" class="name">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">{{ __('Kom ihåg mig') }}</label>
                </p>

                <button style="margin-bottom: 1.5rem;" id="button-blue" type="submit">Logga in</button>
                            
                <p style="text-align: center;" class="name">
                    <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Glömt ditt lösenord?') }}</a>
                        {{ old('remember') ? 'checked' : '' }}
                </p>
 
            </form>
        </div>
    </div>

    @section('footer')
    @endsection

@endsection
