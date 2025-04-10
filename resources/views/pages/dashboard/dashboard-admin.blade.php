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
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">
                            Block 1
                            <BR>
                            <div>
                                <h1>Nombre d'étudiants : {{ $nombreEtudiants }}</h1>
                                <h1>Nombre d'enseignant : {{ $nombreEnseignants  }}</h1>
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
        <div class="lg:col-span-1">
            <div class="card card-grid h-full min-w-full">
                <div class="card-header">
                    <h3 class="card-title">
                        Block 2
                    </h3>
                </div>
                <div class="card-body flex flex-col gap-5">
                </div>
            </div>
        </div>
    </div>
    <!-- End Block 2 -->

    <!-- Block 3 -->
    <BR>
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">
                            Block 3
                        </h3>
                    </div>
                    <div class="card-body flex flex-col gap-5">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Block 3 -->

    <!-- end: grid -->
</x-app-layout>
