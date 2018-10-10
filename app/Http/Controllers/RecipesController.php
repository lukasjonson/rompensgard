<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Recipe;
use DB;

class RecipesController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::orderBy('created_at', 'desc')->paginate(10);
        return view('recipes.index')->with('recipes', $recipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'recipe_title' => 'required',
            'recipe_description' => 'required',
            'recipe_ingredients' => 'required',
            'recipe_manual' => 'required',
            'recipe_image' => 'image|nullable|max:1999',
        ]);

        if($request->hasFile('recipe_image')){
            $filenameWithExt = $request->file('recipe_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('recipe_image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time(). '.'.$extension;
            $path = $request->file('recipe_image')->storeAs('public/recipe_images', $fileNameToStore);
        } else { 
            $fileNameToStore = 'noimage.jpg';
        } 

        $recipe = new Recipe;
        $recipe->recipe_title = $request->input('recipe_title');
        $recipe->recipe_description = $request->input('recipe_description');
        $recipe->recipe_ingredients = $request->input('recipe_ingredients');
        $recipe->recipe_manual = $request->input('recipe_manual');
        $recipe->recipe_image = $fileNameToStore;
        $recipe->user_id = auth()->user()->id;
        $recipe->save();
        return redirect('/recept')->with('success', 'Recept skapat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);
        return view('recipes.show')->with('recipe', $recipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::find($id);

        if(auth()->user()->id !== $recipe->user_id){
            return redirect('recept')->with('error', 'Åtkomst nekad');
        }

        return view('recipes.edit')->with('recipe', $recipe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'recipe_title' => 'required',
            'recipe_description' => 'required',
            'recipe_ingredients' => 'required',
            'recipe_manual' => 'required',
        ]);

        if($request->hasFile('recipe_image')){
            $filenameWithExt = $request->file('recipe_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('recipe_image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time(). '.'.$extension;
            $path = $request->file('recipe_image')->storeAs('public/recipe_images', $fileNameToStore);
        }


        $recipe = Recipe::find($id);
        $recipe->recipe_title = $request->input('recipe_title');
        $recipe->recipe_description = $request->input('recipe_description');
        $recipe->recipe_ingredients = $request->input('recipe_ingredients');
        $recipe->recipe_manual = $request->input('recipe_manual');
        if($request->hasFile('recipe_image')){
            $recipe->recipe_image = $fileNameToStore;
        }
        $recipe->save();
        $updated_post = '/recept/' . $id;
        return redirect($updated_post)->with('success', 'Uppdateringen lyckades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        if(auth()->user()->id !== $recipe->user_id){
            return redirect('recept')->with('error', 'Åtkomst nekad');
        }

        if($recipe->recipe_image != 'noimage.jpg'){
            Storage::delete('public/recipe_images/' . $recipe->recipe_image);
        }
    
        $recipe->delete();
        return redirect('/dashboard')->with('success', 'Raderingen lyckades');
    }
}
