<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::with(['user', 'department'])->paginate(10);
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        $users = User::select('id', 'name')->get();
        $departments = Department::select('id', 'name')->get();

        return view('admin.employees.create', compact('users', 'departments'));
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'department_id' => 'required|exists:departments,id',
            'address' => 'required|string|max:255',
            'place_of_birth' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'religion' => 'required|in:Islam,Katolik,Protestan,Hindu,Budha,Konghucu',
            'sex' => 'required|in:Male,Female',
            'phone' => 'required|string|max:15',
            'salary' => 'required|numeric',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:5048',
        ]);

        // Create the 'employee_photos' folder if it doesn't exist
        if (!file_exists(public_path('employee_photos'))) {
            mkdir(public_path('employee_photos'), 0777, true);
        }

        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt('pass'),
        ]);

        // Handle photo upload
        $newImage = null;
        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newImage = time() . '.' . $extension;
            $request->file('photo')->move(public_path('employee_photos'), $newImage);
        }

        // Save employee details
        $employeeData = $request->all();
        $employeeData['user_id'] = $user->id;
        $employeeData['photo'] = $newImage;

        Employee::create($employeeData);

        return redirect()->route('employees.index')->with('success', 'Employee and user created successfully.');
    }

    public function show($id)
    {
        $employee = Employee::with(['user', 'department'])->findOrFail($id);
        return view('admin.employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $users = User::select('id', 'name')->get();
        $departments = Department::select('id', 'name')->get();

        return view('admin.employees.edit', compact('employee', 'users', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
            'address' => 'required|string|max:255',
            'place_of_birth' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'religion' => 'required|in:Islam,Katolik,Protestan,Hindu,Budha,Konghucu',
            'sex' => 'required|in:Male,Female',
            'phone' => 'required|string|max:15',
            'salary' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5048',
        ]);

        // Create the 'employee_photos' folder if it doesn't exist
        if (!file_exists(public_path('employee_photos'))) {
            mkdir(public_path('employee_photos'), 0777, true);
        }

        $employee = Employee::findOrFail($id);

        if ($request->hasFile('photo')) {
            if ($employee->photo) {
                $oldPhotoPath = public_path('employee_photos/' . $employee->photo);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            $extension = $request->file('photo')->getClientOriginalExtension();
            $newImage = time() . '.' . $extension;
            $request->file('photo')->move(public_path('employee_photos'), $newImage);
        } else {
            $newImage = $employee->photo;
        }

        $employee->update([
            'user_id' => $request->user_id,
            'department_id' => $request->department_id,
            'address' => $request->address,
            'place_of_birth' => $request->place_of_birth,
            'dob' => $request->dob,
            'religion' => $request->religion,
            'sex' => $request->sex,
            'phone' => $request->phone,
            'salary' => $request->salary,
            'photo' => $newImage,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        if ($employee->photo) {
            $photoPath = public_path('employee_photos/' . $employee->photo);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
