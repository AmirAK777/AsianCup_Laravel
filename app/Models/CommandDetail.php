<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandDetail extends Model
{
    use HasFactory;

    protected $fillable = ['command_id', 'id_match', 'quantity', 'billet_date'];

    protected $appends = ['total_price'];

    protected $dates = ['billet_date'];
    
    public function match(){
        return $this->hasOne(MatchModel::class, 'id', 'id_match');
    }

    public function getTotalPriceAttribute(){
        return $this->match->price * $this->quantity;
    }
}
