<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'role',
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

     

    /**
     * Find the user instance for the given username.
     *
     * @param  string  $username
     * @return \App\User
     */
    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }

    /**
     * Check if user has role asked
     * 
     * @param role
     * 
     * @return boolean
     */
    public function hasRole($role)
    {
        return $this->role == $role;
    }

    public function konsumen()
    {
        return $this->hasOne('App\Konsumen');
    }

    public function umkm()
    {
        return $this->hasOne('App\Umkm');
    }

    public function cabang()
    {
        return $this->hasOne('App\Cabang');
    }

    public function kasir()
    {
        return $this->hasOne('App\Kasir');
    }

    public function pengelola()
    {
        return $this->hasOne('App\Pengelola');
    }
}
