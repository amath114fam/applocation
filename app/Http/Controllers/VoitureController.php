<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Car $car)
    {
       return view('voitures.create',compact('car'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'marque'=>'required',
            'modele'=>'required',
            'matricule'=>'required',
            'prix'=>'required',
            'image'=>'required',
        ]);
        // Paiement::create($request->all());
        $request->session()->put('voiture_data', $request->all());
        return redirect()->route('Utilisateur.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Voiture $voiture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voiture $voiture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voiture $voiture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voiture $voiture)
    {
        //
    }
}
