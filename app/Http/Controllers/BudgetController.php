<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Budget::all());
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
            'value' => 'required',
            'field_id' => 'required',
            'user_id' => 'required',
            'month_id' => 'required',
            'year_id' => 'required',
        ]);

        Budget::create($request->all());

        return response([
            'message' => "Création de la valeur Budget {$request->value} réussie",
            'donnees' => Budget::query()->orderBy('id', 'desc')->first(),
            //'id' => Budget::query()->orderBy('id', 'desc')->first()->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        return response()->json(Budget::find($budget->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Budget $budget)
    {
        $budget = Budget::findOrFail($budget->id);
        $budget->update($request->all());
        return response([
            'message' => "Modification de la valeur Budget id {$budget->id} réussie",
            'donnees' => $budget

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budget $budget)
    {
        Budget::findOrFail($budget->id)->delete();
        return response([
            'message' => "Suppression de la valeur Budget id {$budget->id} réussie",
            'donnees' => $budget

        ]);
    }
}
