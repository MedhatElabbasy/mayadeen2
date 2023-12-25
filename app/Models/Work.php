<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'description',
        'image',
        'attachments',
    ];

    public function writers()
    {
        return $this->belongsToMany(Writer::class, 'writers_works');
    }
}
