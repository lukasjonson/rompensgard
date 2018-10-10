@extends('layouts.app')
@include('inc.url')

@include('resources.backgrounds')

<?php
    $header = [
        'style' => 'background-image:url(' . Background::$dashboard . ')',
        'class' => 'header-color header-dashboard',
        'title' => 'Redigera inlägg',
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
                             
            {!! Form::open(['autocomplete' => 'off', 'id' => 'form1', 'class' => 'form', 'action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            
            <p class="name">
                {{Form::text('title', $post->title, ['class' => 'feedback-input', 'id' => 'name', 'placeholder' => 'Titel'])}}
            </p>
                
            <p class="text">
                {{Form::textarea('body', $post->body, ['id' => 'post_text', 'class' => 'feedback-input', 'placeholder' => 'Textinnehåll'])}}
            </p>
                
            <p class="name cover_image_button">
                {{Form::file('cover_image')}}
            </p>
                           
            <div class="submit">
                <a href="{{URL::$url }}blogg/{{$post->id}}" id="button-blue">Avbryt</a>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('OK', ['id' => 'button-blue', 'class' => 'btn btn-primary'])}}
            </div>
            
            {!! Form::close() !!}
                            
        </div>
    </div>

    @section('footer')
                
    @endsection

    <script>
        CKEDITOR.replace( 'post_text' );
    </script>

@endsection