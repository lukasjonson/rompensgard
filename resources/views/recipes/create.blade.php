@extends('layouts.app')
@include('inc.url')

@include('resources.backgrounds')

<?php
    $header = [
        'style' => 'background-image:url(' . Background::$dashboard . ')',
        'class' => 'header-color header-dashboard',
        'title' => 'Nytt recept',
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
        
            {!! Form::open(['autocomplete' => 'off', 'class' => 'form', 'id' => 'form1','action' => 'RecipesController@store', 'method' => 'POST',
                        'enctype' => 'multipart/form-data']) !!}
                        
            <p class="name">
                {{Form::text('recipe_title', '', ['class' => 'feedback-input', 'id' => 'name', 'placeholder' => 'Titel'])}}
            </p>

            <p class="text">
                {{Form::textarea('recipe_description', '', ['id' => 'recipe_description', 'class' => 'feedback-input', 'placeholder' => 'Beskrivning'])}}
            </p>

            <p class="text">
                {{Form::textarea('recipe_ingredients', '', ['id' => 'recipe_ingredients', 'class' => 'feedback-input', 'placeholder' => 'Ingredienser'])}}
            </p>
                        
            <p class="text">
                {{Form::textarea('recipe_manual', '', ['id' => 'recipe_manual', 'class' => 'feedback-input', 'placeholder' => 'Tillvägagångssätt'])}}
            </p>

            <p class="name cover_image_button">
                {{Form::file('recipe_image')}}
            </p>

            <div class="submit">
                {{Form::submit('Skapa', ['id' => 'button-blue', 'class' => 'btn btn-primary'])}}
            </div>
                
            {!! Form::close() !!}

        </div>
    </div>
                    
    @section('footer')
    @endsection

    <script>
            CKEDITOR.replace( 'recipe_manual' );
            CKEDITOR.replace('recipe_ingredients');
    </script>

@endsection