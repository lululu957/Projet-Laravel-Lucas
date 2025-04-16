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

        // Créer l'utilisateur
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
            'password' => Hash::make($password),
        ]);

        // Créer l'association avec l'école
        UserSchool::create([
            'user_id' => $user->id,
            'school_id' => 1, // ou l’ID de l’école que tu veux associer
            'role' => 'student',
        ]);

        // Envoie un e-mail avec le mot de passe généré
        Mail::to($user->email)->send(new StudentPasswordMail($user, $password));

//        // Si la requête est en AJAX
//        if ($request->ajax()) {
//            // Le bon modèle ici : 'student' => $user, pas $user->userSchool
//            $html = view('components.student-row', ['student' => $user])->render();
//            return response()->json(['dom' => $html]);
//        }

        // Retourne à la page précédente avec un message de succès
        return back()->with('success', 'Étudiant ajouté et mot de passe envoyé !');
    }


}

