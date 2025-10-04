<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=[
        'title',
        'description',
        'capacity',
        'professor_id',
        'is_active'
    ];
    public function professor(){
        return $this->belongsTo(Professor::class);
    }

    public function collegians()
    {
        return $this->belongsToMany(Collegian::class);
    }

}
