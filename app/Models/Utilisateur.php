<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $fillable=[
        'nom',
        'prenom',
        'email'
    ];
    public function locations(){
        return $this->HasMany(Location::class);
    }
}
