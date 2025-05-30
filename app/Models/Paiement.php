<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable=[
        'datedepaiement',
        'montant',
        'statut',
        'location_id'
    ];
    public function locations(){
        return $this->belongsTo(Location::class);
    }
}
