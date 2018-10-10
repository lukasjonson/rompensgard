@extends('layouts.app')
@include('inc.url')

@include('resources.backgrounds')

<?php 
    $header = [
        'style' => 'background-image:url(/storage/cover_images/' . $post->cover_image  . ')',
        'class' => 'header-index',
        'title' => $post->title,
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
            <div class="left">
                {!! $post->body !!}
            </div>

        </div>

        <p class="p post-creation-date">Författare: {{$post->user->name}}</p>
        <p style="clear: both; font-size:1.32rem" class="p post-creation-date">{{$post->created_at}}</p>
        <p style="clear:both;font-size:1.32rem" class="p post-creation-date">Redigerad: {{$post->updated_at}}</p>
        <p class="">

            <div id="fb-share" class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Dela</a></div>

            <div id="fb-root"></div>
                <script>
                    (function(d, s, id) {
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
        @if(Auth::user()->id == $post->user_id)
            <div class="edit-post">
                <a href="{{URL::$url }}blog/{{$post->id}}/edit" class="btn btn-default">Redigera</a>
                    <form >
                        <input type="button" class="delete-post-button btn btn-link pull-right" value="radera">
                    </form>
            </div>
        @endif
    @endif

    @include('inc.full_footer_page')
    <div id="darken-screen"></div>
    <div id="delete-confirmation-box">
            <p>Bekräfta radering av blogginlägg</p>
            <div style="display: flex;flex-direction:row;justify-content:center">
                <button class="close-confirmation-box">Avbryt</button>
                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' =>
            'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Radera', ['class' => 'delete-post-button btn btn-link'])}}
            {!!Form::close()!!}
        </div>
    </div>
@endsection 
