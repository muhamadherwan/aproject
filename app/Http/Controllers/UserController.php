<?php

namespace App\Http\Controllers;

use App\Models\ConfigState;
use App\Models\ModelHasRoles;
use App\Models\Role;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('modules.administration.users.index', compact('roles'));
    }

    public function getAjax(Request $request)
    {
        if ($request->ajax()) {

            $selectedRole = $request->role;

            $query =
                User::join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
                    ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                    ->select('users.id', 'users.name', 'users.email', 'users.mykad', 'users.phonenumber', 'roles.name AS role',);

            if ($selectedRole != 'all') {
                $query = $query->where('roles.id', $selectedRole);
            }

            $data = !empty($query) ? $query->get() : [];

            foreach ($data as $row) {
                $row->actionUpdate = route('users.edit', ['user' => $row->id]);
                $row->actionDelete = route('users.destroy', ['user' => $row->id]);
            }

            return DataTables::of($data)->addIndexColumn()->toJson();
        }
    }

    public function create()
    {
        $states = ConfigState::all();
        $roles = Role::all();

        return view('modules.administration.users.create', compact('states', 'roles'));
    }

    public function store()
    {
        $user = User::create([
            'name' => strtoupper(request('name')),
            'email' => strtolower(request('email')),
            'password' => Hash::make('123456'),
            'mykad' => request('mykad'),
            'dob' => request('dob'),
            'phonenumber' => str_replace('-', '', str_replace(' ', '', request('phonenumber'))),
            'title' => strtoupper(request('title')),
            'department' => strtoupper(request('department')),
            'position' => strtoupper(request('position')),
            'grade' => strtoupper(request('grade')),
            'address' => strtoupper(request('address')),
            'postcode' => request('postcode'),
            'area' => strtoupper(request('area')),
            'city' => strtoupper(request('city')),
            'config_states_fk' => request('state'),
            'avatar' => 'images/avatar-1.jpg',
            'status' => request('status'),
            'created_by' => Auth::id()
        ]);

        $role = Role::where('id', request('radioRole'))->first();
        $user->syncRoles($role->name);

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {

    }

    public function edit($user)
    {
        $states = ConfigState::all();
        $roles = Role::all();

        $selectedUser = User::where('id', $user)->first();
        $selectedRole = ModelHasRoles::where('model_id', $user)->first();

        return view('modules.administration.users.edit', compact('states', 'roles', 'selectedUser', 'selectedRole'));
    }

    public function update(User $user)
    {

        User::where('id', $user->id)->update([
            'name' => strtoupper(request('name')),
            'email' => strtolower(request('email')),
//                'password' => Hash::make('123456'),
            'mykad' => request('mykad'),
            'dob' => request('dob'),
            'phonenumber' => str_replace('-', '', str_replace(' ', '', request('phonenumber'))),
            'title' => strtoupper(request('title')),
            'department' => strtoupper(request('department')),
            'position' => strtoupper(request('position')),
            'grade' => strtoupper(request('grade')),
            'address' => strtoupper(request('address')),
            'postcode' => request('postcode'),
            'area' => strtoupper(request('area')),
            'city' => strtoupper(request('city')),
            'config_states_fk' => request('state'),
            'avatar' => 'images/avatar-1.jpg',
            'status' => request('status'),
        ]);
        $role = Role::where('id', request('radioRole'))->first();
        $user->syncRoles([$role->name]);

        return redirect()->route('users.index');
    }


    public function destroy(User $user)
    {
        return response()->json([
            'status' => $user->delete()
        ]);
    }
}
