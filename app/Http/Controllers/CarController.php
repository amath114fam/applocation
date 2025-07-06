<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('voitures.car');
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
        'marque' => 'required',
        'modele' => 'required',
        'matricule' => 'required',
        'prix' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('photos', 'public'); 
    }
    Car::create(array_merge($request->all(), ['image' => $path]));
    return redirect()->route('affiche');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
