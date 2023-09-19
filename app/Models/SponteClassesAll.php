<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SponteClassesAll extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'sponte_classes_all';

    protected $fillable = [
        'class_id',
        'name',
        'situation',
        'modalidade_id',
        'modalidade',
        'time',
        'check'
    ];

}
