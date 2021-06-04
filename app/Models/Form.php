<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;

class Form extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'start_time',
        'end_time',
        'is_active',
        'user_id',
        'uuid'
    ];

    protected $casts = ['date' => 'datetime'];

    /**
     * Método de Laravel el cual realiza un cast de un string con formato de time para hacerlo carbon y darle formato
     * de 12 horas
     */
    public function getStartTimeAttribute($start_time)
    {
        return Carbon::parse($start_time);
    }

    /**
     * Método de Laravel el cual realiza un cast de un string con formato de time para hacerlo carbon y darle formato
     * de 12 horas
     */
    public function getEndTimeAttribute($end_time)
    {
        return Carbon::parse($end_time);
    }

    public function owner()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
