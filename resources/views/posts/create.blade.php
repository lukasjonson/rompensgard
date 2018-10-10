@extends('layouts.app')
@include('inc.url')

@include('resources.backgrounds')

<?php
    $header = [
        'style' => 'background-image:url(' . Background::$dashboard . ')',
        'class' => 'header-color header-dashboard',
        'title' => 'Nytt inlägg',
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

            {!! Form::open(['autocomplete' => 'off', 'class' => 'form', 'id' => 'form1','action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        
            <p class="name">
                {{Form::text('title', '', ['class' => 'feedback-input', 'id' => 'name', 'placeholder' => 'Titel'])}}
            </p>

            <p class="text">
                {{Form::textarea('body', '', ['id' => 'post_text', 'class' => 'feedback-input', 'placeholder' => 'Textinnehåll'])}}
            </p>

            <p class="name cover_image_button">
                {{Form::file('cover_image')}}
            </p>
                        
            <div class="submit">
                {{Form::submit('Skapa', ['id' => 'button-blue', 'class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>

        </div>
    </div>

    @section('footer')
                
    @endsection

    <script>
            CKEDITOR.replace( 'post_text' );
    </script>

@endsection