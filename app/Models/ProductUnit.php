<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductUnit extends Model
{
    protected $fillable = [
        'unit',
        'short_unit',
    ];

    public function userRecord()
    {
        return $this->hasMany(UserRecord::class);
    }
}
