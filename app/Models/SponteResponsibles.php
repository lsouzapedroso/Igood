<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponteResponsibles extends Model
{

    protected $primaryKey = 'responsible_id';

    use HasFactory;

    protected $fillable = [
        'responsible_id',
        'name',
        'address',
        'number',
        'district',
        'city',
        'state',
        'zip_code',
        'home_phone',
        'cell_phone',
        'email',
        'business_phone',
        'job',
        'observation',
        'birthdate',
        'cpf',
        'rg',
        'additional_address_data',
        'spontenet_username',
        'spontenet_password',
        'gender',
    ];

}
