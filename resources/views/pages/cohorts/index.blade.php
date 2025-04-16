<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Promotions') }}
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
                        <h3 class="card-title">Mes promotions</h3>
                    </div>
                    <div class="card-body">
                        <div data-datatable="true" data-datatable-page-size="5">
                            <div class="scrollable-x-auto">
                                <table class="table table-border" data-datatable-table="true">
                                    <thead>
                                    <tr>
                                        <th class="min-w-[280px]">
                                        <span class="sort asc">
                                            <span class="sort-label">Promotion</span>
                                            <span class="sort-icon"></span>
                                        </span>
                                                                </th>
                                                                <th class="min-w-[145px]">
                                        <span class="sort">
                                            <span class="sort-label">Année</span>
                                            <span class="sort-icon"></span>
                                        </span>
                                        </th>
                                        <th class="min-w-[145px]">
                                        <span class="sort">
                                            <span class="sort-label">Etudiants</span>
                                            <span class="sort-icon"></span>
                                        </span>
                                        </th>
                                        <th class="min-w-[50px]">
                                            <span class="sort asc">
                                                 <span class="sort-label">Icone</span>
                                            </span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cohorts as $cohort)
                                        <tr>
                                            <td>
                                                <div class="flex flex-col gap-2">
                                                    <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                       href="{{ route('cohort.show', $cohort->id) }}">
                                                        {{ $cohort->name }}
                                                    </a>
                                                        <span class="text-2sm text-gray-700 font-normal leading-3">
                                                            {{ $cohort->location ?? 'Non spécifié' }}
                                                        </span>
                                                </div>
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($cohort->start_date)->year }}
                                                -
                                                {{ \Carbon\Carbon::parse($cohort->end_date)->year }}
                                            </td>
                                            <td>{{ $cohort->students_count }}</td>
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
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <div
                                class="card-footer justify-center md:justify-between flex-col md:flex-row gap-5 text-gray-600 text-2sm font-medium">
                                <div class="flex items-center gap-2 order-2 md:order-1">
                                    Show
                                    <select class="select select-sm w-16" data-datatable-size="true"
                                            name="perpage"></select>
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
                        Ajouter une promotion
                    </h3>
                </div>
                <form method="POST" action="{{ route('cohort.store') }}" class="card-body flex flex-col gap-5">
                    @csrf

                    <x-forms.input name="name" :label="__('Nom')"/>

                    <x-forms.input name="description" :label="__('Description')"/>

                    <x-forms.input type="date" id="edit_start_date" name="start_date" :label="__('Début de l\'année')"/>

                    <x-forms.input type="date" id="edit_end_date" name="end_date" :label="__('Fin de l\'année')"/>


                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <x-forms.primary-button>
                        {{ __('Valider') }}
                    </x-forms.primary-button>
                </form>
            </div>
        </div>
    </div>
    <!-- end: grid -->

    <script>
        function openEditModal(element) {
            const cohort = JSON.parse(element.getAttribute('data-cohort'));

            document.getElementById('edit_name').value = cohort.name || '';
            document.getElementById('edit_description').value = cohort.location || '';
            document.getElementById('edit_start_date').value = cohort.start_date || '';
            document.getElementById('edit_end_date').value = cohort.end_date || '';

            // Mettez l'action dynamiquement
            const form = document.getElementById('edit_user_form');
            form.action = `/cohorts/${cohort.id}`;

            document.getElementById('cohort-modal').classList.remove('hidden');
        }
    </script>
</x-app-layout>
@include('pages.cohorts.cohort-modal')
