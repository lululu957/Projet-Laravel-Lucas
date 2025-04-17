<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">{{ $cohort->name }}</span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <!-- Colonne des étudiants -->
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">Etudiants</h3>
                    </div>
                    <div class="card-body">
                        <div data-datatable="true" data-datatable-page-size="30">
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
                                        <th class="min-w-[50px]">
                                            <span class="sort asc">
                                                 <span class="sort-label">Icone</span>
                                            </span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td class="px-0 py-2 text-center w-[80px]">
                                            <div class="flex items-center justify-center gap-4">
                                                <!-- Icône de modification -->
                                                <a class="hover:text-primary cursor-pointer"
                                                   href="#"
                                                   data-modal-toggle="#cohort-modal"
                                                   data-cohort='@json($cohort)'
                                                   onclick="openEditModal(this)">
                                                    <i class="ki-filled ki-cursor"></i>
                                                </a>

                                                <!-- Icône de suppression -->
                                                <form action="{{ route('user.destroy', $cohort->id) }}" method="POST"
                                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="hover:text-danger cursor-pointer bg-transparent border-0">
                                                        <i class="text-danger ki-filled ki-shield-cross"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
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

        <!-- Colonne pour ajouter un étudiant -->
        <div class="lg:col-span-1">
            <div class="card h-full">
                <div class="card-header">
                    <h3 class="card-title">
                        Ajouter un étudiant à la promotion
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cohort.attachStudent', $cohort->id) }}" class="card-body flex flex-col gap-5">
                    @csrf
                        <x-forms.dropdown name="user_id" :label="__('Etudiant')">
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">
                                    {{ $student->last_name }} {{ $student->first_name }}
                                </option>
                            @endforeach
                        </x-forms.dropdown>
                        <button type="submit">Tester</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end: grid -->


</x-app-layout>
