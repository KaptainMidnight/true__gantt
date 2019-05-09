<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property array|string|null name
 */
class Roles extends Model
{
    protected $fillable = ['*'];
    public $timestamps = false;
    public function userProjects()
    {
        return $this->hasMany(UserProject::class, 'role_id', 'id');
    }
}
