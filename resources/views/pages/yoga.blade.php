@extends('layouts.app')
@include('inc.url')

@include('resources.backgrounds')

<?php 
    $header = [
        'style' => 'background-image:url(' . Background::$yoga . ')',
        'class' => 'header-image',
        'title' => 'Getyoga',
        'color' => 'white'
    ];
    
    $nav = [
        'color' => 'white',
        'class' => ''
    ];
?>

@section('content')
                
    
    
    @include('inc.full_footer_page')

@endsection