<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\JobPosition;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $positions = JobPosition::all();
        return view('employees.create', compact('departments', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'school_id' => 'required|string|max:255|unique:employees,school_id',
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'sname' => 'nullable|string|max:255',
            'bdate' => 'required|date',
            'sex' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'department_id' => 'nullable|string|max:255',
            'position_id' => 'nullable|string|max:255',
        ], [], [
            'school_id' => 'School ID',
            'fname' => 'First Name',
            'mname' => 'Middle Name',
            'lname' => 'Last Name',
            'sname' => 'Suffix Name',
            'bdate' => 'Birthdate',
            'sex' => 'Sex',
            'image' => 'Image',
            'department_id' => 'Department',
            'position_id' => 'Program/Course',

        ]);

        if ($request->hasFile('image')) {
            $imagepath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagepath;
        }
        Employee::create($validated);
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);
        $department = Department::find($employee->department_id);
        $position = JobPosition::find($employee->position_id);
        return view('employees.show', compact('employee', 'position', 'department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $positions = JobPosition::all();

        return view('employees.edit', compact('employee', 'departments', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrFail($id);

        $validated = $request->validate([
            'school_id' => 'required|string|max:255|unique:employees,school_id,' . $employee->id,
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'sname' => 'nullable|string|max:255',
            'bdate' => 'required|date',
            'sex' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'department_id' => 'nullable|string|max:255',
            'position_id' => 'nullable|string|max:255',
        ], [], [
            'school_id' => 'School ID',
            'fname' => 'First Name',
            'mname' => 'Middle Name',
            'lname' => 'Last Name',
            'sname' => 'Suffix Name',
            'bdate' => 'Birthdate',
            'sex' => 'Sex',
            'image' => 'Image',
            'department_id' => 'Department',
            'position_id' => 'Position',
        ]);

        if ($request->hasFile('image')) {
            $imagepath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagepath;
        }

        $employee->update($validated);
        return redirect()->route('employees.show', $employee->id)->with('success', 'Employee update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employees)
    {
        //
    }
}
