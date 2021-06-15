<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Position;
use App\Models\Career;
use App\Models\Role;
use App\Models\Form;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'position_id',
        'career_id',
        'password',
        'role_id',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function forms()
    {
        return $this->hasMany(Form::class);
    }

    public function isAdmin()
    {
        return $this->role->name == 'admin';
    }

    public function isOfficial()
    {
        return $this->role->name == 'official';
    }
}
