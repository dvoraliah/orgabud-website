<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Auth::user()->status()->get());
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

        Status::create($request->all());

        return response([
            'message' => "Création du statut réussie.",
            'donnees' => Status::query()->orderBy('id', 'desc')->first(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        // return $status;
        // return Auth::user()->status->name;
        if(Auth::user()->status->name == 'Admin')
        {
        return response()->json(Status::find($status->id));
        }
        else if(Auth::user()->status->name == 'Regular'){
            if($status->name != 'Admin' ){
                return response()->json(Status::find($status->id));
            }
            else return ['message' => 'Droit insuffisant pour afficher ce statut'];
        }
        else $this->index();  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        if (Auth::user()->status->name == 'Admin')
        {
            $status = Status::findOrFail($status->id);
            $status->update($request->all());        
            return response([
                'message' => "Mise à jour du statut réussie.",
                'donnees' => $status,
            ]);
        }
        else return ['message' => 'Droits insuffisants'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        if (Auth::user()->status->name == 'Admin') {
            Status::findOrFail($status->id)->delete();

            return response([
                'message' => "Suppression du statut $status->id réussie.",
                'donnees' => $status,
            ]);
        } else return ['message' => 'Droits insuffisants'];
    }
}
