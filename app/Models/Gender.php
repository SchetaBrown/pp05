<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = [
        'gender',
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
