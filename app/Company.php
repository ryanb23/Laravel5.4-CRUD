<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'addr','tel'
    ];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
