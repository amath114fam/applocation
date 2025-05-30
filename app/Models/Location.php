<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable=[
        'datedebut',
        'datefin',
        'statuts',
        'user_id',
        'voitures_id'
    ];
     public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function voitures(){
        return $this->belongsTo(Voiture::class);
    }
    public function paiements(){
        return $this->hasOne(Paiement::class);
    }
}
