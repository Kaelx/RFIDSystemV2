<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\JobPosition;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $positions = JobPosition::all();
        return view('employee.create', compact('departments', 'positions'));
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
            // 'rfid' => 'nullable|string|max:255|unique:employees,rfid',
            'rfid' => [
            'nullable',
            'string',
            'max:255',
            Rule::unique('employees', 'rfid'),
            Rule::unique('students', 'rfid'),
            Rule::unique('sellers', 'rfid'),
            ],
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
            'rfid' => 'RFID',
            'department_id' => 'Department',
            'position_id' => 'Job Position',

        ]);

        if ($request->hasFile('image')) {
            $imagepath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagepath;
        }
        Employee::create($validated);
        return redirect()->route('employee.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::with(['department', 'position'])->findOrFail($id);
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $positions = JobPosition::all();

        return view('employee.edit', compact('employee', 'departments', 'positions'));
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
            'rfid' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('employees', 'rfid')->ignore($employee->id),
                Rule::unique('students', 'rfid'),
                Rule::unique('sellers', 'rfid'),
            ],
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
            'rfid' => 'RFID',
            'department_id' => 'Department',
            'position_id' => 'Job Position',
        ]);

        if ($request->hasFile('image')) {
            $imagepath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagepath;
        }

        $employee->update($validated);
        return redirect()->route('employee.show', $employee->id)->with('success', 'Employee update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employees)
    {
        //
    }
}
