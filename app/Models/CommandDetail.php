<?php

namespace App\Models;
use Illuminate\Support\Facades\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandDetail extends Model
{
    use HasFactory;

    protected $fillable = ['command_id', 'id_match', 'quantity', 'billet_date', 'category'];

    protected $appends = ['total_price'];



    protected $dates = ['billet_date'];

    public function match()
    {
        return $this->hasOne(MatchModel::class, 'id_match', 'id_match');
    }

    public function getTotalPriceAttribute()
    {
        $test = ($this->match->price * $this->category) * $this->quantity;

    
        return $test;
    }
}
