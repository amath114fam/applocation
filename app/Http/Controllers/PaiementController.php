<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Location;
use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations=Location::all();
        return view('paiements.create',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
         $request->validate([
            'datedepaiement'=>'required',
            'montant'=>'required',
            'statut'=>'required',
            'location_id',
        ]);
        // Paiement::create($request->all());
       $request->session()->put('paiement_data', $request->all());

       $voitureData = $request->session()->get('voiture_data');
       $locationData = $request->session()->get('location_data');
       $paiementData = $request->session()->get('paiement_data');

         $voiture = Voiture::create($voitureData);

        
        if (isset($voiture->id)) {
            $locationData['voitures_id'] = $voiture->id;
        }
        $location = Location::create($locationData);

        if (isset($location->id)) {
            $paiementData['location_id'] = $location->id;
        }
        Paiement::create($paiementData);

        
        $request->session()->forget(['voiture_data', 'location_data', 'paiement_data']);

        return redirect()->route('Utilisateur.create')->with('message','Location validée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paiement $paiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paiement $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paiement $paiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paiement $paiement)
    {
        //
    }
}
