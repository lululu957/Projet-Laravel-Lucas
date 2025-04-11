<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSchool;
use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        $students = UserSchool::where('role','student')->get();
        return view('pages.students.index', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users,email',
            'birth_date' => 'required|date',
        ]);

        $user = User::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
            'password' => bcrypt($request->email), // à changer dans un vrai projet
        ]);

        UserSchool::create([
            'user_id' => $user->id,
            'school_id' => 1,
            'role' => 'student',
        ]);

        return redirect()->route('student.index')->with('success', 'Élève ajouté avec succès');
    }

    //function to showStudents
    public function showStudents()
    {
        $students = UserSchool::where('role','student')->get();

        return view('pages.students.index', compact('students'));
    }
}

