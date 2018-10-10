@extends('layouts.app')
@include('inc.url')

@include('resources.backgrounds')

<?php 
    $header = [
        'style' => 'background-color: white',
        'class' => 'header-image',
        'title' => 'Rompens recept',
        'color' => '#282828'
    ];

    $nav = [
        'color' => '#282828',
        'class' => 'index-link'
    ];
?>

@section('content')
    
    <div class="container recipes-index">
       
        @if(count($recipes) > 0)
            
            @foreach($recipes as $recipe)

                <div class="one-recipe-container">
                    <a href="/recept/{{$recipe->id}}">
                        <div class="one-recipe-image" style="background-image: url(storage/recipe_images/{{ $recipe->recipe_image}})">
                            <div class="one-recipe-info">
                                <h2 class="h2 one-recipe-title">{{$recipe->recipe_title}}</h2>
                                <div class="one-recipe-description">{{$recipe->recipe_description}}</div>
                            </div>
                        </div>
                    </a>
                </div>

            @endforeach
        @else
        <p>Inga inlägg</p>
        @endif
                            
    </div>

@endsection