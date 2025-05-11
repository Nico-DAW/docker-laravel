<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar cita') }}
            </h2>
            <a href="{{ route('dashborad') }}" class="btn btn-outline-primary px-2 py-1 rounded-md">
                {{ __('Volver') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('citas.update', $cita) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">{{ __('Marca') }}</label>
                            <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('marca', $cita->marca) }}" required>
                            @error('marca')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">{{ __('Modelo') }}</label>
                            <input type="email" name="email" id="email" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('modelo', $cita->modelo) }}" required>
                            @error('modelo')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">{{ __('Matricula) }}</label>
                            <input type="email" name="email" id="email" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('modelo', $cita->modelo) }}" required>
                            @error('matricula')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-primary px-4 py-2 rounded-md">
                            {{ __('Actualizar') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>