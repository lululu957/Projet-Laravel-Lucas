<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Etudiants') }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <link rel="stylesheet" href="{{ asset('css/student.css') }}">
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">Liste des étudiants</h3>
                        <div class="input input-sm max-w-48">
                            <i class="ki-filled ki-magnifier"></i>
                            <input placeholder="Rechercher un étudiant" type="text"/>
                        </div>
                    </div>
                    <div class="card-body">
                        <div data-datatable="true" data-datatable-page-size="5">
                            <div class="scrollable-x-auto">
                                <table class="table table-border" data-datatable-table="true">
                                    <thead>
                                    <tr>
                                        <th class="min-w-[135px]">
                                            <span class="sort asc">
                                                 <span class="sort-label">Nom</span>
                                                 <span class="sort-icon"></span>
                                            </span>
                                        </th>
                                        <th class="min-w-[135px]">
                                            <span class="sort">
                                                <span class="sort-label">Prénom</span>
                                                <span class="sort-icon"></span>
                                            </span>
                                        </th>
                                        <th class="min-w-[135px]">
                                            <span class="sort">
                                                <span class="sort-label">Date de naissance</span>
                                                <span class="sort-icon"></span>
                                            </span>
                                        </th>
                                        <th class="min-w-[135px]">
                                            <span class="sort asc">
                                                 <span class="sort-label">Email</span>
                                                 <span class="sort-icon"></span>
                                            </span>
                                        </th>
                                        <th class="min-w-[70px]">
                                            <span class="sort asc">
                                                 <span class="sort-label">Icone</span>
                                            </span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->user->last_name }}</td>
                                            <td>{{ $student->user->first_name }}</td>
                                            <td>{{ $student->user->birth_date }}</td>
                                            <td>{{ $student->user->email }}</td>
                                            <td>
                                                <div class="flex items-center justify-between">
                                                    <!-- Icône de modification -->
                                                    <a class="hover:text-primary cursor-pointer"
                                                       href="#"
                                                       data-modal-toggle="#student-modal"
                                                       data-user='@json($student->user)'
                                                       onclick="openEditModal(this)">
                                                        <i class="ki-filled ki-cursor"></i>
                                                    </a>

                                                    <!-- Icône de suppression avec confirmation -->
                                                    <form action="{{ route('user.destroy', $student->user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="hover:text-danger cursor-pointer bg-transparent border-0">
                                                            <i class="text-danger ki-filled ki-shield-cross"></i> <!-- Icône bouclier rouge -->
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer justify-center md:justify-between flex-col md:flex-row gap-5 text-gray-600 text-2sm font-medium">
                                <div class="flex items-center gap-2 order-2 md:order-1">
                                    Show
                                    <select class="select select-sm w-16" data-datatable-size="true" name="perpage"></select>
                                    per page
                                </div>
                                <div class="flex items-center gap-4 order-1 md:order-2">
                                    <span data-datatable-info="true"></span>
                                    <div class="pagination" data-datatable-pagination="true"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="card h-full">
                <div class="card-header">
                    <h3 class="card-title">
                        Ajouter un étudiant
                    </h3>
                </div>
                <form method="post" action="{{ route('student.store') }}" class="form-top-space">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">Prénom</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Nom</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="birth_date">Date de naissance</label>
                        <input type="date" id="birth_date" name="birth_date" required>
                    </div>

                    <button type="submit" class="submit-btn">Ajouter l’élève</button>
                </form>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

            </div>
        </div>
    </div>
    <!-- end: grid -->

    <script>
        function openEditModal(element) {
            const user = JSON.parse(element.getAttribute('data-user'));

            document.getElementById('edit_user_form').action = `/users/${user.id}`;
            document.getElementById('edit_last_name').value = user.last_name;
            document.getElementById('edit_first_name').value = user.first_name;
            document.getElementById('edit_email').value = user.email;
            document.getElementById('edit_birth_date').value = user.birth_date;
        }
    </script>

</x-app-layout>

@include('pages.students.student-modal')
