<?php

namespace App\Http\Controllers\API;


use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::all() ;
        return response()->json($categories);  
        
    }
    public function show($id){
        $categorie = Categorie::findOrFail($id) ;
        return response()->json($categorie) ;
    }
    public function store(Request $request){
        $validated = $request->validate([
         'name'=>'required|string|max:255',
         

        ]);
        $categories = Categorie::create(  $validated);
        return response()->json($categories,201);
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'name'=>'required|string|max:255' ,
            
        ]);
        $categoris = Categorie::findOrFail($id);
        $categoris->update($validated);
        return response()->json($categoris);
    }
    public function destory($id){
        $categorie = categorie::findOrFail($id);
        $categorie->delete();
        return response()->json([
            'massage'=>'categories deleted succefel' ,
        ]);

    }




}
