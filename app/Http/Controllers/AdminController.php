<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;
use App\Models\Budget;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\BudgetController;

class AdminController extends Controller
{
    /**
     * Affiche tous les budgets de tous les utilisateurs
     *
     * @return \Illuminate\Http\Response
     */
    public function indexBudget(){
        return response()->json(Budget::all());
    }

    /**
     * Affiche la liste de tous les status
     *
     * @return void
     */
    public function indexStatus()
    {
        return response()->json(Status::all());
    }

    /**
     * Affiche La liste de tous les Utilisateurs
     *
     * @return void
     */
    public function indexUsers()
    {
        return response()->json(User::all());
    }

    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFields(Request $request)
    {
        // $availablePage = [
        //     'budgets', 'fields', 'status', 'categories', 'users'
        // ];

        return redirect('fields.test');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(String $page, $id)
    {
        if ($page == 'budgets') {
            return response()->json(Budget::find($id));
        }
        if ($page == 'status') {
            return response()->json(Status::find($id));
        }
        if ($page == 'users') {
            return response()->json(User::find($id));
        } else {
            return response([
                'message' => "la page demandée n'est pas accessible"
            ], 404);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
