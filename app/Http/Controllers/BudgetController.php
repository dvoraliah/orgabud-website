<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Budget;
use App\Models\Field;
use App\Models\FieldCategory;
use Exception;
use Illuminate\Http\Request;
use function PHPSTORM_META\type;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Auth::user()->budgets()->with(['field', 'user'])->get());
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
            'month' => 'required',
            'year' => 'required',
        ]);

        $request['user_id'] = Auth::id();

        Budget::create($request->all());

        return response([
            'message' => "Création de la valeur Budget {$request->value} réussie",
            'donnees' => Budget::query()->orderBy('id', 'desc')->first(),
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
        $result = Budget::with(['field', 'user'])->where([
            ['id', '=', $budget->id],
            ['user_id', '=', Auth::id()]
        ])->get();
        
        if(Auth::user()->status->name == 'Admin'){
            return response()->json(Budget::find($budget->id));
        }else{
            if (isset($result[0])) {
                return response()->json($result);
            } else {
                return ['message' => "La valeur de ce budget n'est pas accessible avec ce profil"];
            }
        }
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
        if(Auth::user()->id == $budget->user_id){
            $budget = Budget::findOrFail($budget->id);
            $budget->update($request->all());
            return response([
                'message' => "Modification de la valeur Budget id {$budget->id} réussie",
                'donnees' => $budget
            ], 201);
        }
        else{
            return response([
                'message' => "Modification de la valeur Budget impossible, droits insuffisants"
            ], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budget $budget)
    {
        if (Auth::user()->id == $budget->user_id) {
            Budget::findOrFail($budget->id)->delete();
            return response([
                'message' => "Suppression de la valeur Budget id {$budget->id} réussie",
                'donnees' => $budget
            ]);
        } else {
            return response([
                'message' => "Suppression de la valeur Budget impossible, droits insuffisants"
            ], 401);
        }
    }

    public function filter($filter){
        $category = FieldCategory::where('slug', $filter)->first();
        $field = Field::where('field_category_id', $category->id)->get();
        ///$budget = Auth::id;

        $budget = User::with('budgets.field.field_category')->find(Auth::id());
        // return view('welcome');
        return response([
            'budget'=>$budget,
            'id' => Auth::id(),
        ], 200);
    }
}
