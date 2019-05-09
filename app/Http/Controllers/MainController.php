<?php

namespace App\Http\Controllers;

use App\Projects;
use App\Roles;
use App\UserProject;
use App\UsersData;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function list()
    {
        $data = [];
        $users = UsersData::all();

        foreach ($users as $user) {
            $data[] = [
                'id' => $user->id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'img' => env('DOMAIN') . $user->img,
            ];
        }
        return $data;
    }

    public function show($id)
    {
        return UsersData::find($id);
    }

    public function create(Request $request)
    {
        $model = new UsersData();

        $model->firstname = $request->post('firstname');
        $model->lastname = $request->post('lastname');
        $model->img = $request->file('photo')->store('storage', 'public');
        $model->save();
        return [
            'id' => $model->id,
            'firstname' => $model->firstname,
            'lastname' => $model->lastname,
            'img' => env('DOMAIN') . $model->img
        ];
    }

    public function createProject(Request $request)
    {
        $project = new Projects();
        $users = $request->input('users');
        $project->name = $request->input('project')['name'];
        $project->date_start = $request->input('project')['date_start'];
        $project->date_end = $request->input('project')['date_end'];
        $project->description = $request->input('project')['description'];
        $project->save();
        foreach ($users as $user)
        {
            $role = Roles::find($user['role_id']);
            $usersss = UsersData::find($user['user_id']);
            $usersProject = new UserProject();
            $usersProject->role()->associate($role);
            $usersProject->project()->associate($project);
            $usersProject->user()->associate($usersss);
            $usersProject->save();
        }
        return $usersProject;
    }

    public function projectsList()
    {
        $data = [];
        $projects = Projects::all();

        foreach ($projects as $project) {
            $data[] = [
                'id' => $project->id,
                'name' => $project->name,
                'date_start' => $project->date_start,
                'date_end' => $project->date_end
            ];
        }

        return $data;
    }

    public function removeUser($id)
    {
        $model = UsersData::find($id);
        $model->delete();
        return $model;
    }

    public function usersProjects($id)
    {
        $mas = [];
        $project = Projects::findOrFail($id);
        $userProjects = $project->userProjects;
        foreach ($userProjects as $userProject) {
            $user = $userProject->user;
            $role = $userProject->role;
            $mas[$user->id] = [
                'user' => $user,
                'role' => $role->name
            ];
        }

        $response = [
            'id' => $project->id,
            'name' => $project->name,
            'date_start' => $project->date_start,
            'date_end' => $project->date_end,
            'users' => array_merge($mas)
        ];
        return $response;
    }
}
