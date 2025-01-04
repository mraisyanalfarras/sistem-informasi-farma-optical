<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // Tampilkan semua user
    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Tampilkan form untuk membuat user baru
    public function create() {
        $roles = Role::all(); // Ambil semua role
        return view('admin.users.create', compact('roles'));
    }

    // Simpan user baru
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:5|confirmed', // Validasi password
        ]);

        $validated['password'] = Hash::make($validated['password']); // Hash password menggunakan Hash::make()

        $user = User::create($validated);
        $user->assignRole($request->input('role'));

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Tampilkan form untuk mengedit user
    public function edit(User $user) {
        $roles = Role::all();
        if ($roles->isEmpty()) {
            return redirect()->route('users.index')->with('error', 'No roles available. Please create roles first.');
        }
        return view('admin.users.edit', compact('user', 'roles'));
    }
    // Update user yang ada
    public function update(Request $request, User $user) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role' => 'required|exists:roles,id', // Validasi role
        ]);

        $user->update($validated);

        // Cari role berdasarkan ID
        $role = Role::find($request->input('role'));
        if ($role) {
            $user->syncRoles($role->name); // Sinkronkan role
        }

        // Update password jika diinputkan
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
            $user->save();
        }
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Hapus user
    public function destroy(User $user) {
        $user->delete(); // Soft delete user
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}