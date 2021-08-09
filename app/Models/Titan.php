<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'character_id',
        'picture_url',
        'height_m',
        'description'
    ];

    public function shifter()
    {
        return $this->belongsTo(Character::class, 'character_id');
    }

}
