<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassMember extends Model
{
    use HasFactory;

    protected $table = 'class_members';
    public function members()
    {
        return $this->hasMany(ClassMember::class, 'class_id');
    }

    protected $fillable = [
        'class_id',
        'student_id',
        'start_date'
    ];

}
