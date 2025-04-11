<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Met à jour un utilisateur existant.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'email' => 'required|email|max:255',
        ]);

        $user->update([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'birth_date' => $request->birth_date,
            'email' => $request->email,
        ]);


        return redirect()->back()->with('success', 'Utilisateur mis à jour avec succès.');
    }
}


