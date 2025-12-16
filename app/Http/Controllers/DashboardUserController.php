<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardUserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('role')
            ->when($request->role_id, fn ($q) =>
                $q->where('role_id', $request->role_id))
            ->paginate(10);

        $roles = Role::all();

        return view('dashboard.users.index', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('dashboard.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|min:3',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role_id'  => 'required|exists:roles,id',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role_id'  => $request->role_id,
        ]);

        return redirect('/dashboard/users')
            ->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user  = User::findOrFail($id);
        $roles = Role::all();

        return view('dashboard.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'    => 'required|string|min:3',
            'email'   => 'required|email|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id',
            'password'=> 'nullable|min:6',
        ]);

        $data = [
            'name'    => $request->name,
            'email'   => $request->email,
            'role_id' => $request->role_id,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect('/dashboard/users')
            ->with('success', 'User berhasil diperbarui');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete(); // soft delete
        return back()->with('success', 'User berhasil dihapus');
    }
}
