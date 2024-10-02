<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // display the list of Students 
    public function index () {

    // retrieve all students from the database
    $students = Student::all();
    
    // Return the 'data' view with the list of students
    return view('grade-book.data', compact('students'));

    }
     // Store a new student
     public function store(Request $request)
     {
         // Validate the incoming request data
         $request->validate([
             'student_id' => 'required|unique:students|max:255',
             'name' => 'required',
             'course' => 'required',
             'grading_system' => 'required',
         ]);
 
         // Create a new student record in the database
         Student::create([
             'student_id' => $request->student_id,
             'name' => $request->name,
             'course' => $request->course,
             'grading_system' => $request->grading_system,
         ]);
 
         // Redirect back to the student list
         return redirect()->back()->with('success', 'Student added successfully!');
     }
}
