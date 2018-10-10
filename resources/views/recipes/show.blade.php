@extends('layouts.app')
@include('inc.url')

@include('resources.backgrounds')

<?php 
    $header = [
        'style' => 'background-color: white',
        'title' => $recipe->recipe_title,
        'class' => 'header-index',
        'color' => '#282828'
    ];  
    
    $nav = [
        'color' => '#282828',
        'class' => 'index-link'
    ];
?>

@section('content')

<style>
.case .section--text-image, .case .section--image-text {
    padding: 0;
}
</style>

    <section class="section section--text-image nav-black">
        <div id="recept_container">
            
            <div id="ingredient_column" class="recept_column">
                <div id="ingredient_content">
                    <h2>Vad behöver jag?</h2>
                    {!!$recipe->recipe_ingredients!!}
                </div>
            </div>
                                    
            <div id="make_column" class="recept_column">
                <div style="background-image: url(/storage/recipe_images/{{$recipe->recipe_image}})" id="recept_img"></div>
                <div id="recept_flex">
                    <div class="make_two_columns">
                        <div> {!!$recipe->recipe_manual!!} </div>
                    </div>

                    <div id="recept_link">
                        <i class="fas fa-arrow-circle-left"></i>
                        <a id="recept_text"href="{{URL::$url }}recept">Gå tillbaka till alla recept.</a>
                    </div>
                </div>
            </div>

        </div>
                                
                        
        <p style="clear: both; font-size:1.32rem" class="p post-creation-date">{{$recipe->created_at}}</p>
        <p style="clear:both;font-size:1.32rem" class="p post-creation-date">Redigerad: {{$recipe->updated_at}}</p>
        <p class="">
                                
            <div id="fb-share" class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Dela</a></div>
            <div id="fb-root"></div>
                <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/sv_SE/sdk.js#xfbml=1&version=v3.1';
                    fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>
        </p>
                    
    </section>
                        
    @if(!Auth::guest())
        @if(Auth::user()->id == $recipe->user_id)
        
            <div class="edit-post">
                <a href="{{URL::$url }}recept/{{$recipe->id}}/edit" class="btn btn-default">Redigera</a>

                <form >
                    <input type="button" class="delete-post-button btn btn-link pull-right" value="radera">
                </form>

            </div>

        @endif
    @endif

    <div id="darken-screen"></div>
    <div id="delete-confirmation-box">
        <p>Bekräfta radering av blogginlägg</p>
        <div style="display: flex;flex-direction:row;justify-content:center">
            <button class="close-confirmation-box">Avbryt</button>
                
            {!!Form::open(['action' => ['RecipesController@destroy', $recipe->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Radera', ['class' => 'delete-post-button btn btn-link'])}}
            {!!Form::close()!!}
        </div>
    </div>

@endsection