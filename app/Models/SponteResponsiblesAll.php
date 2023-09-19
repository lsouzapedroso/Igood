<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponteResponsiblesAll extends Model
{
    use HasFactory;

    protected $table = 'sponte_responsibles_all';

    protected $fillable = [
        'name',
        'responsible_id',
        'cell_phone',
        'email',
        'birthdate',
        'spontenet_username',
        'spontenet_password',
    ];

}
