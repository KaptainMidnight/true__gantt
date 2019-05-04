<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    public $table = 'user_project';
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(UsersData::class);
    }

    public function project()
    {
        return $this->belongsTo(Projects::class);
    }

    public function role()
    {
        return $this->belongsTo(Roles::class);
    }
}
