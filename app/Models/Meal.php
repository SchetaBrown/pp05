<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Meal extends Model
{
    protected $fillable = [
        'title'
    ];

    public function userRecord()
    {
        return $this->hasMany(UserRecord::class);
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {
                if (function_exists('mb_ucfirst')) {
                    return mb_ucfirst($value);
                }

                return mb_strtoupper(mb_substr($value, 0, 1)) . mb_substr($value, 1);
            },
        );
    }
}
