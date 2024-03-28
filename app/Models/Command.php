<?php

namespace App\Models;
use Illuminate\Support\Facades\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function details(){
        return $this->hasMany(CommandDetail::class);
    }

    public function detailsSell(){
        return $this->hasMany(CommandSellDetail::class);
    }
}