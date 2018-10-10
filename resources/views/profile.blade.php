@include('resources.backgrounds')
@include('inc.url')

<?php 
    $header = [
        'style' => 'background-image:url(' . Background::$dashboard . ')',
        'class' => 'header-color header-dashboard',
        'title' => 'Välkommen, ' . Auth::user()->name,
        'color' => 'white'
    ];

    $nav = [
        'color' => 'white',
        'class' => ''
    ];
?>

@extends('layouts.app')

@section('content')

                <div class="page-wrapper">
                    <div class="dashboard-container">
                        <div id="dashboard-switch" style="width:60%;margin:0 auto">
                            <div class="switch">
                                <input type="radio" class="switch-input" name="view" value="week" id="week" checked>
                                <label for="week" class="switch-label switch-label-off">Inlägg</label>
                                <input type="radio" class="switch-input" name="view" value="month" id="month">
                                <label for="month" class="switch-label switch-label-on">Recept</label>
                                <span class="switch-selection"></span>
                            </div>
                        </div>
                        <div id="dashboard-posts-and-recipes">
                            <table id="post-table">
                                <caption class="form-title">Blogginlägg</caption>
                                <caption class="new-post"><a href="/blogg/create">Lägg till <i class="fa fa-plus-circle"></i></a></caption>
                                <thead>
                                    <tr>
                                        <th class="del-column"></th>
                                        <th scope="col">Titel</th>
                                        <th scope="col">Redigera</th>
                                        <th scope="col">Uppladdad</th>
                                        <th class="del-column" scope="col">
                                            <button class="delete-multiple-button" id="delete_btn" type="submit">
                                                <i class="fa post-trash fa-trash"></i>
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($posts) > 0)


                                    @foreach($posts as $post)
                                    <tr>
                                        <td style="background-image:url(storage/cover_images/{{$post->cover_image}})"
                                            class="del-column img-col"></td>
                                        <td><a href="/blogg/{{$post->id}}">{{$post->title}}</a></td>
                                        <td class="mobile-hide"><a class="dashboard-edit-button" href="/blogg/{{$post->id}}/edit">Redigera</a></t>
                                        <td class="mobile-hide">{{$post->created_at}}</td>
                                        <td class="del-column mobile-hide">
                                            <label class="checkbox-container">
                                                <input class="post_id" value="{{$post->id}}" type="checkbox">
                                                <span class="checkbox-checkmark"></span>
                                            </label>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    @endif
                                </tbody>
                            </table>


                            <table id="recipe-table">
                                <caption class="form-title">Recept</caption>
                                <caption class="new-post"><a href="/recept/create">Lägg till <i class="fa fa-plus-circle"></i></a></caption>
                                <thead>

                                    <tr>
                                        <th class="del-column"></th>
                                        <th scope="col">Titel</th>
                                        <th scope="col">Redigera</th>
                                        <th scope="col">Uppladdad</th>
                                        <th class="del-column" scope="col">
                                            <button class="delete-multiple-button" id="delete_btn_recipe" type="submit">
                                                <i class="fa recipe-trash fa-trash"></i>
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if(count($recipes) > 0)
                                    @foreach($recipes as $recipe)
                                    <tr>
                                        <td style="background-image:url(storage/recipe_images/{{$recipe->recipe_image}})"
                                            class="del-column img-col"></td>
                                        <td><a href="/recept/{{$recipe->id}}">{{$recipe->recipe_title}}</a></td>
                                        <td class="mobile-hide"><a class="dashboard-edit-button" href="/recept/{{$recipe->id}}/edit">Redigera</a></td>
                                        <td class="mobile-hide">{{$recipe->created_at}}</td>
                                        <td class="del-column mobile-hide">
                                            <label class="checkbox-container">
                                                <input class="post_id_recipe" value="{{$recipe->id}}" type="checkbox">
                                                <span class="checkbox-checkmark"></span>
                                            </label>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    @endif

                                </tbody>
                            </table>
                        </div>

                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                    </div>

                    <div style="background-color: seagreen;" class="user-posts home-button">
                        <a href="/" class="btn btn-default"><i class="fa fa-home"></i> Gå till hemsidan</a>
                    </div>
                    <div id="logout-link-container">
                        <div class="user-posts logout-link">

                            <li href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><a>
                                    {{ __('Logga ut') }}
                                </a>
                            </li>
                        </div>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>

                @section('footer')
                
                @endsection
@endsection
