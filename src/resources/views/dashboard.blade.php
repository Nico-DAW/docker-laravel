<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ "Bienvenido ". auth()->user()->name}}
            </h2>
            @if (auth()->check() && auth()->user()->role === 'cliente')
            <a href="{{ route('citas.create') }}" class="btn btn-outline-primary px-2 py-1 rounded-md">
                    {{ __('Nueva cita') }}
            </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Include citas --}}
                    @include('citas.index')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
