<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReEnrolling extends Model
{
    protected $table = 're_enrolling';

    protected $fillable = [
        'sponte_student_id',
        'front_student_id',
        'status_id',
    ];

    public function sponteStudent()
    {
        return $this->belongsTo(SponteStudent::class, 'sponte_student_id', 'student_id');
    }

    public function frontStudent()
    {
        return $this->belongsTo(FrontStudent::class, 'front_student_id', 'id');
    }
}
