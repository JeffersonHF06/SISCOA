<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
