<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponteClasses extends Model
{
    use HasFactory;

    protected $table = 'sponte_classes';

    protected $fillable = [
        'class_id',
        'name',
        'professor_id',
        'professor_name',
        'capacity',
        'semester',
        'time'
    ];
    public function classe()
    {
        return $this->belongsTo(SponteClass::class, 'class_id');
    }

}
