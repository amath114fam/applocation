<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('accueil.test');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'datedebut'=>'required',
            'datefin'=>'required',
            'statuts'=>'required',
            'user_id'=>'required',
            'voitures_id'=>'required',
        ]);
        // Paiement::create($request->all());
        Location::create($request->all());
        return redirect()->route('paiement.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        $user = Auth::user();
        

        return view('accueil.show', compact('location','user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //  $location = Location::with(['voitures', 'paiement'])->findOrFail($id);
        $user = Auth::user(); 

       return view('accueil.edit', compact('location', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
         $request->validate([
        'marque' => 'required',
        'modele' => 'required',
        // 'statut' => 'required',
        // 'datedebut' => 'required',
        // 'datefin' => 'required',
    ]);

   
    $location->voitures->marque = $request->input('marque');
    $location->voitures->modele = $request->input('modele');
    // $location->paiements->statut = $request->input('statut');
    // $location->datedebut = $request->input('datedebut');
    // $location->datefin = $request->input('datefin');

    
    $location->voitures->save();
    // $location->paiements->save();
    $location->save();
    return redirect()->route('Utilisateur.create')->with('message','Voiture et modèle modifié avec succès');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {

    // $location->voitures->marque = $request->input('marque');
    // $location->voitures->modele = $request->input('modele');
    // $location->paiements->statut = $request->input('statut');
    // $location->datedebut = $request->input('datedebut');
    // $location->datefin = $request->input('datefin');
    
    $location->voitures->delete();
    // $location->paiements->delete();
    $location->delete();
    return redirect()->route('Utilisateur.create')->with('message','Location supprimée');
    }
}
