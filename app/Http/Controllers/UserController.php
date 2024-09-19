<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Tampilkan semua user
    public function index() {
        $users = User::with('role')->get(); // Include role relationship
        return view('admin.submenu1', compact('users'));
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

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Tampilkan form untuk mengedit user
    public function edit(User $user) {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    // Update user yang ada
    public function update(Request $request, User $user) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            
        ]);

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Hapus user
    public function destroy(User $user) {
        $user->delete(); // Soft delete user
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
