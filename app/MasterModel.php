<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Master extends Model 
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'mastercds';

    
}
