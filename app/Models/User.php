<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'users';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'role_id',
        'firstname',
        'lastname',
        'email',
        'username',
        'password',
        'verification_token',
        'verification_token_expiry',
        'remember_token',
        'remember_token_expiry',
        'datetime',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'verification_token', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    /*
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    */
}
