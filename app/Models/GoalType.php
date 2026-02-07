<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoalType extends Model
{
    protected $fillable = [
        'type',
        'description',
        'calorie_modifier',
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
