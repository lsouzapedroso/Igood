<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'next_class_id'
    ];
    public function nextClass()
    {
        return $this->belongsTo(Classe::class, 'next_class_id');
    }

}
