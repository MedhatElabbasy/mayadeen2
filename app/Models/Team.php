<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'competition_id'];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}