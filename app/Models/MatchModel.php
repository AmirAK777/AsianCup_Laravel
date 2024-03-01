<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchModel extends Model
{
    use HasFactory;

    protected $table = 'match'; // Nom de la table dans la base de données

    protected $primaryKey = 'match_id'; // Clé primaire de la table

    public $timestamps = false; // Indique si les colonnes de création et de mise à jour sont gérées automatiquement

    protected $fillable = ['name', 'date', 'id_stade']; // Colonnes pouvant être remplies en masse

    // Relation avec le modèle Stade
    public function stade()
    {
        return $this->belongsTo(Stade::class, 'id_stade', 'id_stade');
    }
}
