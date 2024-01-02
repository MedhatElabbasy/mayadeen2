<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competition extends Model
{
    use HasFactory;
    protected $fillable = ['name'];



    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}