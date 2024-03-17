<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MatchModel extends Model
{
    use HasFactory;

    protected $table = 'match'; 

    protected $primaryKey = 'id_match'; 

    public $timestamps = false; 

    protected $fillable = ['name', 'date', 'id_stade', 'id_team1', 'id_team2','price','status']; 

    public function stade(): BelongsTo
    {
        return $this->belongsTo(Stade::class, 'id_stade', 'id_stade');
    }

    public function team1(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'id_team1', 'id_team');
    }

    public function team2(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'id_team2', 'id_team');
    }

    public function match(){
        return $this->hasOne(MatchModel::class, 'id_match', 'id_match');
    }


}