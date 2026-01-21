<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    protected $hidden = ['password'];


    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
