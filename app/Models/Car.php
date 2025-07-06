<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
     protected $fillable=[
        'marque',
        'modele',
        'matricule',
        'prix',
        'image',
    ];
}
