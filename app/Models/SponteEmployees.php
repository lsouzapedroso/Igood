<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponteEmployees extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'full_name',
        'marital_status_id',
        'city_id',
        'district_id',
        'user_id',
        'function_id',
        'gender',
        'birthdate',
        'cpf',
        'rg',
        'address',
        'additional_address_data',
        'zip_code',
        'home_phone',
        'cell_phone',
        'salary',
        'observation',
        'teacher',
        'active',
        'class_hour_value',
        'external_class_hour_value',
        'inss',
        'payment_type',
        'email',
        'agency',
        'account',
        'spontenet_password',
    ];

    protected $casts = [
        'teacher' => 'boolean',
        'active' => 'boolean',
    ];

    protected $dates = [
        'birthdate',
    ];
}
