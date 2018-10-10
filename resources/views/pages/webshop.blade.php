@extends('layouts.app')
@include('inc.url')

@include('resources.backgrounds')

<?php
    $header = [
        'style' => 'background-image:url(' . Background::$webshop . ')',
        'class' => 'header-image',        
        'title' => 'Gårdsbutik',
        'color' => 'white'
    ];

    $nav = [
        'color' => 'white',
        'class' => ''
    ];
?>

@section('content')
                    
@endsection