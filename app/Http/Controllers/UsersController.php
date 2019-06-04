<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function create()
    {
        $roles = Role::all();

        return view('backend.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $rules = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:male,female'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:12'],
            'zipcode' => ['required', 'string', 'max:255'],
            'house_number' => ['required', 'string', 'max:255'],
            'street_name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->assignRole($request->role);

        Customer::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'surname' => $request->surname,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'zipcode' => $request->zipcode,
            'house_number' => $request->house_number,
            'street_name' => $request->street_name,
            'city' => $request->city,
            'province' => $request->province,
        ]);

        return view('backend.users.index');
    }

    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $userRoles = $user->getRoleNames();

        return view('backend.users.edit', compact('user', 'roles', 'userRoles'));
    }

    public function update(Request $request, $id)
    {

        $rules = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:male,female'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'phone' => ['required', 'string', 'max:12'],
            'zipcode' => ['required', 'string', 'max:255'],
            'house_number' => ['required', 'string', 'max:255'],
            'street_name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
        ]);

        User::findOrFail($id)->update(['email' => $request->email, 'disabled' => $request->disabled]);

        Customer::where('user_id', $id)
            ->update($request->except('_token', '_method', 'email', 'disabled'));

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $users = $request->users;
        if (!empty($users)) {
            foreach ($users as $user) {
                User::findOrFail($user)->delete();
                Customer::where('user_id', $user)->first()->delete();
            }
        }
        return redirect()->route('dashboard.users');
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::FindorFail($id);

        if ($request->has('delete')) {
            $user->removeRole($request->role);
            return redirect()->back()->with('error', __('general.role_is_removed'));
        } else if ($request->has('update')) {
            $user->assignRole($request->role);
            return redirect()->back()->with('success', __('general.role_is_added'));
        }
    }
}
