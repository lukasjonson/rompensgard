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
            <form autocomplete="off" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @csrf
                
                <p class="name">
                    <input placeholder="Namn" id="name" type="text" class="feedback-input{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                </p>
                                    
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                                    
                <p class="name">
                    <input placeholder="E-mailadress" id="email" type="email" class="feedback-input{{ $errors->has('email') ? ' is-invalid' : '' }}"
                    name="email" value="{{ old('email') }}" required>
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
                    
                <p class="text">
                    <input placeholder="Bekräfta lösenord" id="password-confirm" type="password" class="feedback-input" name="password_confirmation" required>
                </p>
                                    
                <button type="submit" id="button-blue">{{ __('Registrera dig') }}</button>
            
            </form>
        </div>
    </div>

@endsection