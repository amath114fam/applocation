<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Voiture;
use App\Models\Location;
use App\Models\Paiement;
use App\Models\DashAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        
        $locations = $user->locations()->with(['paiements', 'voitures'])->get();
         
        $userlocations = Location::with(['user','paiements'])->get();

        $supervisionClients = Location::with(['user','paiements', 'voitures'])->orderBy('created_at', 'desc')->get();

        $cars=Car::all();

        $carNumber=Car::count();
        $compte=Paiement::sum('montant');
        $montantFormate = number_format($compte, 2, ',', ' ');

        $matriculesFromCars = Car::pluck('matricule');

        // $countMatricules = Voiture::whereIn('matricule', $matriculesFromCars)->count();
        $countMatricules = Location::where('datefin', '>=', Carbon::today())->pluck('voitures_id')->count();

        $restCar= $carNumber - $countMatricules;

        return view("accueil.look",compact('locations','user', 'cars', 'userlocations','carNumber','countMatricules','restCar','montantFormate','supervisionClients'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DashAdmin $dashAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DashAdmin $dashAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DashAdmin $dashAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DashAdmin $dashAdmin)
    {
        //
    }
}
