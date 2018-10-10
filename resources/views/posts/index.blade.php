@extends('layouts.app')
@include('inc.url')

@include('resources.backgrounds')

<?php 
    $header = [
        'style' => 'background-color: white',
        'class' => 'header-image',
        'title' => 'Blogg',
        'color' => '#282828'
    ];

    $nav = [
        'color' => '#282828',
        'class' => 'index-link'
    ];
?>

@section('content')

    <div class="container recipes-index">
    
        @if(count($posts) > 0)
       
            @foreach($posts as $post)
        
                <div class="one-recipe-container">
                    <a href="{{URL::$url }}blogg/{{$post->id}}">
                        <div class="one-recipe-image" style="background-image: url(/storage/cover_images/{{$post->cover_image}})">
                            <div class="one-recipe-info">
                                <h2 class="h2 one-recipe-title">{{$post->title}}</h2>
                                <div class="one-recipe-description">{{$post->author}}</div>
                            <o
                        </div>
                    </a>
                </div>

            @endforeach
        @else
        <p>Inga inlägg</p>
        @endif

    </div>

@endsection