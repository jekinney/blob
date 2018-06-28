<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = [];

    /**
    * Get all users assigned a permission
    */
    public function users()
    {
    	return $this->belongsToMany( User::class );
    }
}
