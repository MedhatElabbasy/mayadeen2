<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionVote extends Model
{
    use HasFactory;

    protected $fillable = [
        "team",
        "round",
    ];

    public function getTeamAttribute($value)
    {
        return $value == "1" ? 'الفريق المعارض ( الأدب )' : 'الفريق المؤيد ( السينما )';
    }

    public function getRoundAttribute($value)
    {
        return match($value) {
            "1"     => "الجولة الأولى",
            "2"     => "الجولة الثانية",
            "3"     => "الجولة الثالثة",
            default => "الجولة الأولى",
        };
    }
}
