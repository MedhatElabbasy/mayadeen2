<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poem extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'poem',
        'author',
        'phone',
        'email',
    ];


    public function getTypeAttribute($value)
    {
        return $value == 'faq' ? 'الفصحى' : 'نبطية';
    }

}
