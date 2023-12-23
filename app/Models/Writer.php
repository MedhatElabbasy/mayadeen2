<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    use HasFactory;

    protected $casts = [
        'attachments' => 'array',
    ];
    
    public $fillable = [
        'name',
        'about',
        'quote',
        'birthday',
        'deathday',
        'attachments',
    ];

    public function works(){
        return $this->belongsToMany(Work::class, 'writers_works');
    }
}
