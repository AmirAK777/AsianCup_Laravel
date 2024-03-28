<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'id_match', 'quantity', 'billet_date', 'category', 'billet_id'];

    protected $appends = ['total_price'];



    public function match()
    {
        return $this->hasOne(MatchModel::class, 'id_match', 'id_match');
    }

    public function billet()
    {
        return $this->hasOne(Billet::class, 'billet_id', 'billet_id');
    }


    public function getTotalPriceAttribute()
    {
        if ($this->match) {
            $test = ($this->match->price * $this->category) * $this->quantity;

            Log::channel('abuse')->info('Total Price Calculation', [
                'test' => $test,
                'category' => $this->category,
                'quantity' => $this->quantity
            ]);

            return $test;
        } else {
            $test = ($this->billet->match->price * $this->category) * $this->quantity;
            Log::channel('abuse')->warning('Match is null for TransactionDetail ID: ' . $this->id);
            return $test;
        }
    }
}
