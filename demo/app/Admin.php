<?php

namespace App;




use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;


class Admin extends Model implements Authenticatable
{
    protected $table='admins';

    use \Illuminate\Auth\Authenticatable;
}
