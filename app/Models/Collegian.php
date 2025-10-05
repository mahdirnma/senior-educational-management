<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collegian extends Model
{
    protected $fillable=[
        'name',
        'phoneNumber',
        'email',
        'age',
        'gender',
        'is_active'
    ];
    public function courses(){
        return $this->belongsToMany(Course::class);
    }
}
