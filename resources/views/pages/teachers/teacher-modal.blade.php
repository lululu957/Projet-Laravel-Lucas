@extends('layouts.modal', [
    'id'    => 'teacher-modal',
    'title'  => 'Informations enseignant',
])

@section('modal-content')
    <form method="POST" id="edit_user_form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="edit_first_name">Prénom</label>
            <input type="text" id="edit_first_name" name="first_name" required>
        </div>

        <div class="form-group">
            <label for="edit_last_name">Nom</label>
            <input type="text" id="edit_last_name" name="last_name" required>
        </div>

        <div class="form-group">
            <label for="edit_email">Email</label>
            <input type="email" id="edit_email" name="email" required>
        </div>

        <div class="form-group">
            <label for="edit_birth_date">Date de naissance</label>
            <input type="date" id="edit_birth_date" name="birth_date" required>
        </div>

        <button type="submit" class="submit-btn">Modifier l'enseignant</button>
    </form>
@overwrite
