<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'about',
        'quote',
        'birthday',
        'deathday',
        'is_alive',
        'image',
        'podcast',
        'qr',
    ];

    public function works(){
        return $this->belongsToMany(Work::class, 'writers_works');
    }
}
