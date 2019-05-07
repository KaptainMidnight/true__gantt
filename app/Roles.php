<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = ['*'];
    public $timestamps = false;
    public function userProjects()
    {
        return $this->hasMany(UserProject::class, 'role_id', 'id');
    }
}
