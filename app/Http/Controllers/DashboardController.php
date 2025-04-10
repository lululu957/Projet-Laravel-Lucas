<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSchool;

class DashboardController extends Controller
{
    public function index() {
        $user = auth()->user();
        $userRole = auth()->user()->school()->pivot->role;

        // On récupère le nombre d'étudiants/d'enseignant seulement si admin ou teacher
        $nombreEtudiants = null;
        $nombreEnseignants = null;

        if (in_array($userRole, ['admin', 'teacher'])) {
            $nombreEtudiants = UserSchool::where('role', 'student')->count();
            $nombreEnseignants = UserSchool::where('role', 'teacher')->count();
        }

        return view('pages.dashboard.dashboard-' . $userRole, compact(
            'nombreEtudiants',
            'nombreEnseignants'
        ));
    }
}
