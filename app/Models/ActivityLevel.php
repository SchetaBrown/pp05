<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLevel extends Model
{
    protected $fillable = [
        'level',
        'description',
        'multiplier',
    ];

    protected $hidden = [
        'createt_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
