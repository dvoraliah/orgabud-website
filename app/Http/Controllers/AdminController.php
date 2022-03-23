<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Budget;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $page)
    {
        
        if ($page == 'budgets') {
            return response()->json(Budget::all());
        }  
        if ($page == 'status') {
            return response()->json(Status::all());
        }
        if ($page == 'users') {
            return response()->json(User::all());
        }    
        else {
            return response([
                'message' => "la page demandée n'est pas accessible"
            ], 404);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(String $page,Request $request)
    {
        $availablePage = [
            'budgets', 'fields', 'status', 'categories', 'user'
        ];
        if (in_array($page, $availablePage) ){
            //TODO
        }
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
