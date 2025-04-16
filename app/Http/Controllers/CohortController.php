<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
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

        $students = User::where('role', 'student')->get(); // ou tout autre filtre

        return view('cohorts.show', compact('cohort', 'students'));
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

    public function addStudent(Request $request, Cohort $cohort)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
        ]);

        // Évite les doublons
        $cohort->students()->syncWithoutDetaching([$request->user_id]);

        return redirect()->back()->with('success', 'Étudiant ajouté avec succès.');
    }


}
