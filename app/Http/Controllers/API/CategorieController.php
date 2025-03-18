<?php

namespace App\Http\Controllers\API;

use App\Models\Profil;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorieController extends Controller
{
    public function index(){
        $profils = Categorie::all() ;
        return response()->json($profils);  
        
    }
    public function show($id){
        $categoris = Categorie::findOrFail($id) ;
        return response()->json($categorie) ;
    }
    public function store(Request $request){
        $validated = $request->validate([
         'name'=>'required|string|max:255',
         

        ]);
        $profil = Categorie::create(  $validated);
        return response()->json($profil,201);
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'name'=>'required|string|max:255' ,
            
        ]);
        $profil = Categorie::findOrFail($id);
        $profil->update($validated);
        return response()->json($profil);
    }
    public function destory($id){
        $categorie = categorie::findOrFail($id);
        $categoris->delete();
        return response()->json([
            'massage'=>'categories deleted succefel' ,
        ]);

    }




}
