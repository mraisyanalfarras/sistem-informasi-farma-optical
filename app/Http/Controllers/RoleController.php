<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role; // Hanya menggunakan Role dari Spatie
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        // Mengambil semua role
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        // Mengambil semua permission yang tersedia
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'array', // Pastikan permissions adalah array
        ]);

        // Membuat role baru dengan field 'guard_name'
        $role = Role::create([
            'name' => $request->input('name'),
            'guard_name' => 'web', // Sesuaikan guard dengan kebutuhan
        ]);

        // Memberi permission ke role
        if ($request->has('permissions')) {
            $role->givePermissionTo($request->input('permissions'));
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('roles.index')->with('success', 'Data berhasil disimpan');
    }
    public function destroy(Role $role) {
        $role->syncPermissions([]);
        $role->delete();
    }

}
