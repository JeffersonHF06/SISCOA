<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function isAdmin()
    {
        return $this->id == 1 ? true : false;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
