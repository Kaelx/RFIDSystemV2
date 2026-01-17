<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellers = Seller::paginate(10);
        return view('seller.index', compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seller.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
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
        ], [], [
            'fname' => 'First Name',
            'mname' => 'Middle Name',
            'lname' => 'Last Name',
            'sname' => 'Suffix Name',
            'bdate' => 'Birthdate',
            'sex' => 'Sex',
            'image' => 'Image',
            'rfid' => 'RFID',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        Seller::create($validated);
        return redirect()->route('seller.index')->with('success', 'Vendor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $seller = Seller::findOrFail($id);
        return view('seller.show', compact('seller'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $seller = Seller::findOrFail($id);
        return view('seller.edit', compact('seller'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $seller = Seller::findOrFail($id);

        $validated = $request->validate([
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
                Rule::unique('sellers', 'rfid')->ignore($seller->id),
            ],
        ], [], [
            'school_id' => 'School ID',
            'fname' => 'First Name',
            'mname' => 'Middle Name',
            'lname' => 'Last Name',
            'sname' => 'Suffix Name',
            'bdate' => 'Birthdate',
            'sex' => 'Sex',
            'image' => 'Image',
        ]);

        if ($request->hasFile('image')) {
            $imagepath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagepath;
        }

        $seller->update($validated);
        return redirect()->route('seller.show', $seller->id)->with('success', 'Employee update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
