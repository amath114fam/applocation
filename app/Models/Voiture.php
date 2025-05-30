<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    protected $fillable=[
        'marque',
        'modele',
        'matricule'
    ];
     public function locations(){
        return $this->HasMany(Location::class);
    }
}
