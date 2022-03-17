<?php

namespace App\Http\Controllers;

use App\Models\Month;
use Illuminate\Http\Request;

class MonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Month::all());
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
            'month' => 'required',
        ]);

        Month::create($request->all());

        return response([
            'message' => "Création du mois réussie.",
            'donnees' => Month::query()->orderBy('id', 'desc')->first(),
        ]);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function show(Month $month)
    {
        return response()->json(Month::find($month->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Month $month)
    {
        $month = Month::findOrFail($month->id);
        $month->update($request->all());

        return response([
            'message' => "Mise à jour de l'année réussie.",
            'donnees' => $month,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function destroy(Month $month)
    {
        Month::findOrFail($month->id)->delete();

        return response([
            'message' => "Suppression l'année $month->id réussie.",
            'donnees' => $month,
        ]);
    }
}
