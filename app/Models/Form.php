<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['title', 'description', 'date', 'start_time', 'end_time', 'is_active', 'user_id'];

    public function owner(){
        return $this->hasOne(User::class, 'user_id');
    }

    public function users(){
        return $this->belognsToMany(User::class);
    }
    
}
