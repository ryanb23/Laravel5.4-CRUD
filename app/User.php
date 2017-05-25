<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','firstname','lastname','department_id', 'company_id', 'group_id','role_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
      return $this->belongsTo('App\Role');
    }
    public function group()
    {
      return $this->belongsTo('App\Group');
    }
    public function department()
    {
      return $this->belongsTo('App\Department');
    }
    public function company()
    {
      return $this->belongsTo('App\Company');
    }
}
