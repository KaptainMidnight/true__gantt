<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersData extends Model
{

    public $timestamps = false;
    public function users()
    {
        return $this->hasMany(UsersData::class, 'user_id', 'id');
    }
}
