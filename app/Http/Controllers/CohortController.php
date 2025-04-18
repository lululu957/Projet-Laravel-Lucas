<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\UserSchool;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CohortController extends Controller
{
    /**
     * Display all available cohorts
     * @return Factory|View|Application|object
     */
    public function index() {
        $cohorts = Cohort::all();
        return view('pages.cohorts.index', compact('cohorts'));
    }


    /**
     * Display a specific cohort
     * @param Cohort $cohort
     * @return Application|Factory|object|View
     */
    public function show(Cohort $cohort) {

        $students = \App\Models\User::whereHas('userschool', function ($query) use ($cohort) {
            $query->where('school_id', $cohort->school_id)
                ->where('role', 'student');
        })->get();

        $users = User::whereHas('userschool', function ($query) use ($cohort) {
            $query->where('cohort_id', $cohort->id);
        })->get();

        return view('pages.cohorts.show', compact('cohort', 'students', 'users'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Cohort::create([
            'school_id' => 1,
            'name' => $validated['name'],
            'description' => $validated['description'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
        ]);

        return redirect()->route('cohort.index')->with('success', 'Promotion ajoutée avec succès !');
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        // Trouver la promotion par ID
        $cohort = Cohort::findOrFail($id);

        // Mettre à jour les champs avec les nouvelles valeurs
        $cohort->update([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);

        // Rediriger ou renvoyer une réponse
        return redirect()->route('cohort.index')->with('success', 'Promotion mise à jour avec succès');
    }

    public function attachStudent(Request $request, Cohort $cohort)
    {
        $userSchool = UserSchool::where('user_id', $request->user_id)
            ->first();


        $userSchool->update([
            'cohort_id' => $cohort->id,
        ]);


        return back();
    }


}
