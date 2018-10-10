<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $recipes_arr = [];
        foreach($user->recipes as $recipe){
            $recipes_arr[] = $recipe;
        }

        $data = ['posts' => $user->posts->reverse(), 'recipes' => array_reverse($recipes_arr)];
        return view('profile')->with($data);
    }
}
