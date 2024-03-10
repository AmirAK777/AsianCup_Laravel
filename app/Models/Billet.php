<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billet extends Model
{
    protected $table = 'billet';
    protected $primaryKey = 'id_billet';
    public $timestamps = false;
    protected $fillable = ['id_match', 'category', 'price', 'availability'];
}