<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'id_match', 'quantity', 'billet_date', 'category'];

    protected $appends = ['total_price'];

    public function match()
    {
        return $this->hasOne(MatchModel::class, 'id_match', 'id_match');
    }

    public function getTotalPriceAttribute()
    {
        $test = ($this->match->price * $this->category) * $this->quantity;

        Log::channel('abuse')->info('Total Price Calculation', [
            'test' => $test,
            'category' => $this->category,
            'quantity' => $this->quantity
        ]);
        
        return $test;
    }
}
