@extends('layouts.app')
@include('inc.url')

@include('resources.backgrounds')

<?php
    $header = [
        'style' => 'background-image:url(' . Background::$dashboard . ')',
        'class' => 'header-color header-dashboard',
        'title' => 'Redigera recept',
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

            {!! Form::open(['autocomplete' => 'off', 'id' => 'form1', 'class' => 'form', 'action' => ['RecipesController@update', $recipe->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        
            <p class="name">
                {{Form::text('recipe_title', $recipe->recipe_title, ['class' => 'feedback-input', 'id' => 'name', 'placeholder' => 'Titel'])}}
            </p>

            <p class="text">
                {{Form::textarea('recipe_description', $recipe->recipe_description, ['id' => 'recipe_description', 'class' => 'feedback-input',
                'placeholder' => 'Beskrivning'])}}
            </p>

            <p class="text">
                {{Form::textarea('recipe_ingredients', $recipe->recipe_ingredients, ['id' => 'recipe_ingredients', 'class' => 'feedback-input',
                'placeholder' => 'Ingredienser'])}}
            </p>

            <p class="text">
                {{Form::textarea('recipe_manual', $recipe->recipe_manual, ['id' => '', 'class' => 'feedback-input', 'placeholder' => 'Tillvägagångssätt'])}}
            </p>

            <div class="submit">
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Uppdatera', ['id' => 'button-blue', 'class' => 'btn btn-primary'])}}
            </div>

            {!! Form::close() !!}
                    
        </div>
    </div>
    
    @section('footer')
    @endsection

    <script>
            CKEDITOR.replace('recipe_manual');
            CKEDITOR.replace('recipe_ingredients');
    </script>

@endsection