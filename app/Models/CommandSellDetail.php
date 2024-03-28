<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandSellDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'command_id',
        'billet_id',
        'quantity',
        'billet_date',
        'category',
    ];

    protected $dates = ['billet_date'];

    public function command()
    {
        return $this->belongsTo(Command::class);
    }

    public function billet()
    {
        return $this->hasOne(Billet::class, 'billet_id', 'billet_id');
    }

    public function getTotalPriceAttribute()
    {
        $test = ($this->billet->match->price * $this->category) * $this->quantity;


        return $test;
    }
}
