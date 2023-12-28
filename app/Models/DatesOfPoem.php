<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatesOfPoem extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner',
        'date',
        'start_time',
        'end_time',
        'is_break',
        'details',
        'type',
    ];
}
