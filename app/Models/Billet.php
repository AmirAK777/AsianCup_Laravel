<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billet extends Model
{
    use HasFactory;

    protected $primaryKey = 'billet_id ';
    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'billet_id ',
        'user_id',
        'id_match',
        'quantity',
        'billet_date',
        'status'
    ];

    protected $dates = [
        'billet_date'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function item(){
        return $this->belongsTo(MatchModel::class,'item_id','id');
    }
}
