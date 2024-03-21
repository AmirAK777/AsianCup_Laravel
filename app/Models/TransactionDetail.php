<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'id_match', 'quantity', 'billet_date'];

    protected $appends = ['total_price'];

    public function match(){
        return $this->hasOne(MatchModel::class, 'id_match', 'id_match');
    }

    public function getTotalPriceAttribute(){
        return $this->match->price * $this->quantity;
    }
}
