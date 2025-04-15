<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSchool;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentPasswordMail;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = UserSchool::where('role', 'teacher')->get();
        return view('pages.teachers.index', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $password = Str::random(10);

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
            'role' => 'teacher',
        ]);

        Mail::to($user->email)->send(new StudentPasswordMail($user, $password));

        return back()->with('success', 'Enseignant ajouté et mot de passe envoyé !');
    }
}
