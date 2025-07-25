<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\Accueil;
use App\Models\Voiture;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars=Car::all();
        $matriculesFromCars = Voiture::pluck('matricule')->unique();
        return view('accueil.index',compact('cars','matriculesFromCars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accueil.list');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Accueil $accueil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accueil $accueil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accueil $accueil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accueil $accueil)
    {
        //
    }
}
