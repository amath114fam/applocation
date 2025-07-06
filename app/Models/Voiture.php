<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    protected $fillable=[
        'marque',
        'modele',
        'matricule',
        'prix',
        'image'
    ];
     public function locations(){
        return $this->HasMany(Location::class);
    }
}
