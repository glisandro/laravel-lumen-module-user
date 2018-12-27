<?php

namespace Glisandro\ModuleUser;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'phoneNumber'
    ];

}
