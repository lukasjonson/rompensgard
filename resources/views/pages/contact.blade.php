@extends('layouts.app')
@include('inc.url')

@include('resources.backgrounds')


<?php
    $header = [
        'style' => 'background-image:url(' . Background::$contact . ')',
        'class' => 'header-image header-contact',        
        'title' => 'Kontakta oss',
        'color' => 'white'
    ]; 

    $nav = [
        'color' => 'white',
        'class' => ''
    ];
?>

@section('content')

    <div id="contact-columns">

        <div id="form-main">
            <div id="form-div">
                <form action="{{ url('kontakt') }}" method="post" class="form" id="form1">
                    {{csrf_field()}}

                    <p class="name" id="contact-subject-dropdown">
                        <select required name="subject" id="subject-input" class="feedback-input">
                            <option disabled selected value="">Välj ett ämne</option>
                            <option value="Getyoga">Getyoga</option>
                            <option value="Gårdsbutiken">Gårdsbutiken</option>
                            <option value="Övrigt">Övrigt</option>
                        </select>
                    </p>
                            
                    <p class="name">
                        <input required name="name" type="text" class="feedback-input" placeholder="För- och Efternamn" id="name-input">
                    </p>
                            
                    <p class="name">
                        <input required name="email" type="email" class="feedback-input" id="email-input" placeholder="E-mailadress">
                    </p>
                            
                    <p class="name">
                        <textarea required name="message" class="feedback-input" id="contact-text" placeholder="Meddelande"></textarea>
                    </p>
                            
                    <p style="margin-bottom: 1rem;" class="text">
                        <button class="feedback-input" name="mail_sent" type="submit" id="button-blue">Skicka</button>
                    </p>

                </form>
            </div>
        </div>
            
        <section class="section section--text-image nav-black">
            <div class="container">
                <div class="left">
                    <h2 class="title">Kontaktuppgifter</h2>
                    <ul>
                        <li><strong>Adress: </strong>Lilla Backalyckavägen 16, 434 93</li>
                        <li><strong>Telefon: </strong><a class="contact-link" href="tel: 0731 82-98-84">0731 82-98-84</a></li>
                        <li><strong>Email: </strong><a class="contact-link" href="mailto: kontakt@rompensgard.se">kontakt@rompensgard.se</a></li>
                    </ul>
                </div>

                <iframe width="100%" height="250" frameborder="0" style="border:0;padding:2rem;padding-left:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJVUskeQXqT0YRkAYO9ldYHvM&key=AIzaSyA5lj8a2Efigf8vqLx2oW6lXXzE5TmrtDc" allowfullscreen>
                </iframe>
                
            </div>
        </section>

    </div>

@endsection