<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $primaryKey = 'id_team';

    protected $fillable = ['club_name', 'club_image'];


    public $incrementing = true;

    public $timestamps = false;

}
