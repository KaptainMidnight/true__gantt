<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property array|mixed|string|null name
 * @property array|mixed|string|null date_start
 * @property array|mixed|string|null date_end
 * @property array|string|null description
 */
class Projects extends Model
{
    protected $table = 'projects';
    protected $fillable = ['*'];
    public $timestamps = false;
    public function userProjects()
    {
        return $this->hasMany(UserProject::class, 'project_id', 'id');
    }
}
