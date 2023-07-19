<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponteStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'birthdate',
        'gender',
        'cpf',
        'rg',
        'address',
        'number',
        'district',
        'city',
        'state',
        'zip_code',
        'home_phone',
        'cell_phone',
        'job',
        'photo',
        'email',
        'spontenet_username',
        'spontenet_password',
        'contract_id',
        'contract_interactive_id',
        'modality',
        'class_id',
        'phase_id',
        'current_phase',
    ];

    protected $casts = [
        'birthdate' => 'datetime',
        'registrations' => 'array',
    ];

    public function situation()
    {
        return $this->belongsTo(Situation::class);
    }
}
