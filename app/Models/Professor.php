<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable=[
        'name',
        'phoneNumber',
        'age',
        'gender',
        'is_active'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
