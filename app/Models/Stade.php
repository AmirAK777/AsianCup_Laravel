<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stade extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'stade'; 

    protected $fillable = ['name', 'cty']; 

}