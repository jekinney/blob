<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
    * Always hash incoming passwords
    */
    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = bcrypt( $password );
    }

    //// Relationships

    /**
    * Get a user's authored articles
    */
    public function articles()
    {
        return $this->hasMany( Article::class );
    }

    /**
    * Get a user's permissions
    */
    public function permissions()
    {
        return $this->belongsToMany( Permission::class );
    }

    ///// Queries

    /**
    * Check if a user has a permission
    *
    * @param string $slug
    * @return boolean
    */
    public function hasPermission($slug)
    {
        return $this->permissions->contains( 'slug', $slug ); 
    }
}
