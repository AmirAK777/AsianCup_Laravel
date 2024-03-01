<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchModel extends Model
{
    use HasFactory;

    protected $table = 'match'; 

    protected $primaryKey = 'match_id'; 

    public $timestamps = false; 

    protected $fillable = ['name', 'date', 'id_stade']; 

    public function stade()
    {
        return $this->belongsTo(Stade::class, 'id_stade', 'id_stade');
    }

    
}
