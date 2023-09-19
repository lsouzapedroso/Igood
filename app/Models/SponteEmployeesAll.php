<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponteEmployeesAll extends Model
{
    use HasFactory;

    protected $table = 'sponte_employees_all';

    protected $fillable = [
        'employee_id',
        'name',
    ];
}
