<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public function userProjects()
    {
        return $this->hasMany(UserProject::class, 'role_id', 'id');
    }
}
