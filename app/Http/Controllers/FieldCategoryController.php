<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\FieldCategory;

class FieldCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(FieldCategory::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $request['slug'] = Str::slug($request->name);

        FieldCategory::create($request->all());

        return response([
            'message' => "Création de la catégorie de champs {$request->name} réussie.",
            'donnees' => FieldCategory::query()->orderBy('id', 'desc')->first(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FieldCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function show(FieldCategory $category)
    {
        return response()->json(FieldCategory::find($category->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FieldCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FieldCategory $category)
    {
        $category = FieldCategory::findOrFail($category->id);
        if($request->name){
            $request['slug'] = Str::slug($request->name);
        }
        

        $category->update($request->all());

        return response([
            'message' => "Mise à jour de la catégorie de champs $category->name réussie.",
            'donnees' => $category,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FieldCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(FieldCategory $category)
    {
        FieldCategory::findOrFail($category->id)->delete();

        return response([
            'message' => "Suppression de la catégorie de champs $category->id réussie.",
            'donnees' => $category,
        ]);
    }
}
