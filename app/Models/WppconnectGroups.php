<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WppconnectGroups extends Model
{
    use HasFactory;

    protected $table = 'wppconnect_groups';

    protected $fillable = [
        'class_id',
        'session_id',
        'serialized_id',
    ];
    public function messages()
    {
        return $this->belongsToMany(Message::class, 'group_message');
    }
    public function classe()
    {
        return $this->belongsTo(SponteClasses::class, 'class_id', 'class_id');
    }

}
