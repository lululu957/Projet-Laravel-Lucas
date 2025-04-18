{{-- Extension de cohorts index --}}
@extends('layouts.modal', [
    'id'    => 'cohort-modal',
    'title'  => 'Informations promotions',
])

{{-- Formulaire permettant  de modifier une promotion --}}
@section('modal-content')
     <form method="POST" id="edit_user_form">
    @csrf
        @method('PUT')

        <div class="form-group">
            <label for="edit_name">Promotion</label>
            <input type="text" id="edit_name" name="name" required>
        </div>

        <div class="form-group">
            <label for="edit_description">Description</label>
            <input type="text" id="edit_description" name="location">
        </div>

        <div class="form-group">
            <label for="edit_years_start">Années de debut</label>
            <input type="date" id="edit_years_start" name="start_date" required>
        </div>

        <div class="form-group">
            <label for="edit_years_end">Années de fin</label>
            <input type="date" id="edit_years_end" name="end_date">
        </div>

        <button type="submit" class="submit-btn">Modifier la promotion</button>
    </form>
@overwrite
