<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Dashboard') }}
            </span>
        </h1>
    </x-slot>
    <!-- begin: grid -->

    <!-- Block 1 -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">
                            Block 1
                            <BR>
                            <div>
                                <a href="{{ route('student.index') }}" class="link_dashboard">Nombre d'étudiants :</a> {{ $nombreEtudiants }}
                            </div>
                        </h3>
                    </div>
                    <div class="card-body flex flex-col gap-5">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Block 1 -->


    <!-- Block 2 -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">
                            Block 2
                            <BR>
                            <div>
                               <a href="{{ route('teacher.index') }}" class="link_dashboard">Nombre d'enseignant :</a> {{ $nombreEnseignants  }}
                            </div>
                        </h3>
                    </div>
                    <div class="card-body flex flex-col gap-5">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Block 2 -->


    <!-- Block 3 -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">
                            Block 3
                            <BR>
                            <div>
                                <a href="{{ route('cohort.index') }}" class="link_dashboard">Nombre de promotions :</a> {{ $nombrePromotions  }}
                            </div>
                        </h3>
                    </div>
                    <div class="card-body flex flex-col gap-5">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Block 3 -->

        <!-- Block 4 -->
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">
                            Block 4
                            <BR>
                            <div>
                                <a href="{{ route('group.index') }}" class="link_dashboard">Nombre de Groupes :</a> {{ $nombreGroups  }}
                            </div>
                        </h3>
                    </div>
                    <div class="card-body flex flex-col gap-5">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Block 4 -->
    </div>
    <!-- end: grid -->
</x-app-layout>
