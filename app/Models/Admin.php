<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    const ROLE_ADMIN = 'Admin';
	const ROLE_MANAGER = 'Manager';

	protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role',
        'name',
        'email',
        'password',
        'active',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    public function avatar(){
        $path = public_path('/media');

        if($this->avatar){
            if(file_exists($path.'/'.$this->avatar)){
                return '/media/'.$this->avatar;
            }
        }
        return '/images/ic_admin.svg';
    }
}
