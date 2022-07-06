<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\FieldCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Field::all());
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
            'field_category_id' => 'required',
            'is_private' => 'boolean'
        ]);

        $request['slug'] = Str::slug($request->name);

        Field::create($request->all());

        return response([
            'message' => "Création du champs {$request->name} réussie.",
            'donnees' => Field::query()->orderBy('id', 'desc')->first(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        return response()->json(Field::find($field->id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Field $field)
    {
        $field = Field::findOrFail($field->id);
        if ($request->name) {
            $request['slug'] = Str::slug($request->name);
        }


        $field->update($request->all());

        return response([
            'message' => "Mise à jour du champs $field->name réussie.",
            'donnees' => $field,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Field $field)
    {
        Field::findOrFail($field->id)->delete();

        return response([
            'message' => "Suppression du champs $field->id réussie.",
            'donnees' => $field,
        ]);
    }
    /**
     * Retourne la liste des champs disponible dans une catégorie
     *
     * @param string $categorie
     * @param string $field
     * @return \Illuminate\Http\Response
     */
    public function fieldsByCategory($category){
        $idCategory = FieldCategory::where('slug', $category)->first('id');
        $champs = Field::where('field_category_id', $idCategory->id)->get();
        return response([
            'champs' => $champs
        ]);
    }
}
