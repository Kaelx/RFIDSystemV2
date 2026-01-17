<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Program;
use Illuminate\Validation\Rule;
use App\Models\RfidScan;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(10);

        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $programs = Program::all();
        return view('student.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'school_id' => 'required|string|max:255|unique:students,school_id',
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
                Rule::unique('employees', 'rfid'),
                Rule::unique('students', 'rfid'),
                Rule::unique('sellers', 'rfid'),
            ],
            'program_id' => 'required|string|max:255',
        ], [], [
            'school_id' => 'School ID',
            'fname' => 'First Name',
            'mname' => 'Middle Name',
            'lname' => 'Last Name',
            'sname' => 'Suffix Name',
            'bdate' => 'Birth Date',
            'sex' => 'Sex',
            'image' => 'Image',
            'rfid' => 'RFID',
            'program_id' => 'Program/Course',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        Student::create($validated);
        return redirect()->route('student.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::with('program.department')->findOrFail($id);
        return view('student.show', compact('student'));
    }


    // public function showRecord(string $id)
    // {
    //     $record = Student::with('program.department')->findOrFail($id);
    //     return view('student.record', compact('record'));
    // }

    public function showRecord(string $id)
    {
        $data = RfidScan::with('recordable')
            ->where('recordable_type', Student::class)
            ->where('recordable_id', $id)
            ->get();
        return view('student.record', compact('data'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        $programs = Program::all();
        return view('student.edit', compact('student', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'school_id' => 'required|string|max:255|unique:students,school_id,' . $student->id,
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
                Rule::unique('employees', 'rfid'),
                Rule::unique('students', 'rfid')->ignore($student->id),
                Rule::unique('sellers', 'rfid'),
            ],
            'program_id' => 'required|string|max:255',
        ], [], [
            'school_id' => 'School ID',
            'fname' => 'First Name',
            'mname' => 'Middle Name',
            'lname' => 'Last Name',
            'sname' => 'Suffix Name',
            'bdate' => 'Birth Date',
            'sex' => 'Sex',
            'image' => 'Image',
            'rfid' => 'RFID',
            'program_id' => 'Program/Course',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        $student->update($validated);
        return redirect()->route('student.show', $student->id)->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
