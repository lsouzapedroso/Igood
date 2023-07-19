<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRegistration extends Model
{
    use HasFactory;

    protected $table = 'class_registrations';

    protected $fillable = [
        'student_id',
        'contract_id',
        'contract_interactive_id',
        'modality',
        'class_id',
        'phase_id',
        'current_phase',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }
}
