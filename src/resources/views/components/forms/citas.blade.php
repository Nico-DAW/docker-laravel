<div class="p-6 text-gray-900">
      <p>Nueva cita</p>
      {{-- Citas::create crea una cita, ver TempCode --}}
      <form action="{{ route('citas.store') }}" method="POST">
            @csrf

            <div class="mb-4">
            <label for="marca" class="block text-gray-700 font-bold mb-2">Marca</label>
            <input type="text" name="marca" id="marca" class="w-full border rounded px-3 py-2" value="{{ old('marca') }}" required>
            </div>

            <div class="mb-4">
            <label for="modelo" class="block text-gray-700 font-bold mb-2">Modelo</label>
            <input type="text" name="modelo" id="modelo" class="w-full border rounded px-3 py-2" value="{{ old('modelo') }}" required>
            </div>

            <div class="mb-4">
            <label for="matricula" class="block text-gray-700 font-bold mb-2">Matrícula</label>
            <input type="text" name="matricula" id="matricula" class="w-full border rounded px-3 py-2" value="{{ old('matricula') }}" required>
            </div>
            <button type="submit" class="btn btn-outline-primary px-4 py-2 rounded-md">
                  {{ __('Guardar') }}
            </button>
      </form>
</div>
