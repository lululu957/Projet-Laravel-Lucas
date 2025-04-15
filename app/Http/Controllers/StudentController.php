<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSchool;
use App\Models\User;
use App\Mail\StudentPasswordMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'birth_date' => 'required|date',
        ]);

        $password = Str::random(10); // mot de passe généré

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
            'password' => Hash::make($password),
        ]);

        UserSchool::create([
            'user_id' => $user->id,
            'school_id' => 1, // ou l’ID de l’école que tu veux associer
            'role' => 'student',
        ]);

        Mail::to($user->email)->send(new StudentPasswordMail($user, $password));

        return back()->with('success', 'Étudiant ajouté et mot de passe envoyé !');
    }

}

