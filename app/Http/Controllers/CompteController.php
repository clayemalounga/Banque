<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Compte;
use App\Models\TypeCompte;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comptes = Compte::with('client','typeCompte')->get();
        return view('comptes.liste',compact('comptes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        $typeComptes = TypeCompte::all();
        return view('comptes.create',compact('clients','typeComptes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'solde' => 'required',
            'client_id' => 'required',
            'type_compte_id' => 'required',
        ],
        [
            'solde.required' => "Le solde ne doit pas etre vide",
        ]);

        $compte = new Compte();
        $compte->solde = $request->input('solde');
        $compte->client_id = $request->input('client_id');
        $compte->type_compte_id = $request->input('type_compte_id');
        $compte->save();
        return redirect()->route('comptes.liste')->with('success','Compte ajouter avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edite(string $id)
    {
        $compte = Compte::find($id);
        $clients = Client::all();
        $typeCompte = TypeCompte::all();
        return view('comptes.edite',compact('compte','clients','typeCompte'));
        
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $compte = Compte::find($id);
        $compte->solde = $request->input('solde');
        $compte->client_id = $request->input('client_id');
        $compte->type_compte_id = $request->input('type_compte_id');
        $compte->save();
        return redirect()->route('comptes.liste')->with('success','Compte ajouter avec success');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        Compte::find($id)->delete();
        return back()->with('success','Supression effectuee');
    }
}
