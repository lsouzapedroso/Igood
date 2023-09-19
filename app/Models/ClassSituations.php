<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSituations extends Model
{
    use HasFactory;

    protected $table = 'class_situations';

    protected $fillable = [
        'student_id',
        'situation_id',
        'description'
    ];



}
