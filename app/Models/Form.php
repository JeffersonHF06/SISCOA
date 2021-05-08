<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [];

    public function owner(){
        return $this->hasOne(User::class, 'user_id');
    }

    public function users(){
        return $this->belognsToMany(User::class);
    }
    
}
