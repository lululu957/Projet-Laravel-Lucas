<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Validation pour l'email
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],

            // Validation pour le mot de passe actuel
            'current_password' => ['required', 'current_password'], // Vérifie que le mot de passe actuel est correct

            // Validation pour le nouveau mot de passe
            'password' => [
                'required',  // Le mot de passe doit être requis
                'string',    // Doit être une chaîne
                'min:8',     // Minimum 8 caractères
                'confirmed', // Vérifie que le mot de passe et sa confirmation sont égaux
            ],

        ];
    }
}
