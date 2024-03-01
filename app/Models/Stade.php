<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stade extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'stade'; // Nom de la table dans la base de données

    protected $fillable = ['name', 'cty']; // Colonnes pouvant être remplies en masse

    // Vous pouvez définir des relations avec d'autres modèles ici si nécessaire
}