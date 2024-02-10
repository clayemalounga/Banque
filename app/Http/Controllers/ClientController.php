<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function AfficherClient()
    {
        $clients = Client::all();
        return view('clients.liste',compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'date_naissance' => 'nullable'
        ],[
            'nom.required'=>"Le champs nom ne doit pas etre vide",
            'prenom.required'=>"Le champs prenom ne doit pas etre vide",
            'adresse.required'=>"Le champs adresse ne doit pas etre vide",
        ]);

        $client  = new Client();
        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->adresse = $request->input('adresse');
        $client->date_naissance = $request->date_naissance;
        $client->CNI = $request->input('CNI');
        $client->save();
        return redirect()->route('clients.list')->with('success','Client ajouter');

    }

    public function edit(int $id)
    {
        $client = Client::find($id);
        return view('clients.edite',compact('client'));
    }

    public function update(Request $request, int $id)
    {

        $client = Client::find($id);
        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->adresse = $request->input('adresse');
        $client->date_naissance = $request->date_naissance;
        $client->CNI = $request->input('CNI');
        $client->save();
        return redirect()->route('clients.list')->with('success',"Client modifier");
    }

    public function delete(int $id)
    {
        Client::find($id)->delete();
        return redirect()->back()->with('success',"Client supprimer");
    }


}
