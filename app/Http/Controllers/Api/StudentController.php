<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        if (!$students) {
            return response()->json([
                'message' => 'Students not found!'
                ], 404);
        } else {
            return response()->json([
                'students' => $students
            ]
        );
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required | min:3',
            'age' => 'required | max:150 | numeric',
        ]);
        $student =Student::create($validated);
        return $student;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        if (!$student) {
            return response()->json([
                'message' => 'Not found!'
            ], 404);
        }
            return response()->json([
                'student' => $student
            ], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required | min:3',
            'age' => 'required | max:150 | numeric',
        ]);
        $student = Student::findOrFail($id);
        $student->update($validated);
        return $student;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::findOrFail($id)->delete();
        return 'Student Deleted Successfully!';
    }

}
