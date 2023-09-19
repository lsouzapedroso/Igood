<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsibleStudents extends Model
{
    use HasFactory;

    protected $table = 'responsible_students';

    protected $fillable = [
    'responsible_id',
    'name',
    'student_id'
    ];

    public function responsible()
    {
        return $this->belongsTo(SponteResponsibles::class, 'responsible_id');
    }

    public function student()
    {
        return $this->belongsTo(SponteStudent::class, 'student_id');
    }

}
