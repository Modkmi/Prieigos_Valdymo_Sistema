<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name', 'floor'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
