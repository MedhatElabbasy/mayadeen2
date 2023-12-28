<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'title',
        'content',
        'w1_name',
        'w1_number',
        'w1_email',
        'w2_name',
        'w2_number',
        'w2_email',
        'w3_name',
        'w3_number',
        'w3_email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
