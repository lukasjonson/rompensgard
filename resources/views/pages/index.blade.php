@extends('layouts.app')
@include('inc.url')

@include('resources.backgrounds')

<?php
    $header = [
        'style' => 'background-image:url(' . Background::$home . ')',
        'class' => 'header-image',
        'title' => 'Rompens Gård',
        'color' => 'white'
    ]; 

    $nav = [
        'color' => 'white',
        'class' => ''
    ];
?>

@section('content')

    <section class="section section--text-image nav-black">
        <div class="container">

            <div>
                <div class="left">
                    <h2 class="title">Välkommen till Rompens Gård i vackra Lerkil!</h2>
                    <p class="p">Här har vi massor av spännande saker. Däribland Getyoga, plädar, och mycket mer.</p>
                </div>
            </div>

            <div>
                <div class="right">
                    <div class="media" style="padding-bottom:135.5%">
                            <img src="/storage/gallery/mum_and_dad.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @include('inc.full_footer_page')

@endsection