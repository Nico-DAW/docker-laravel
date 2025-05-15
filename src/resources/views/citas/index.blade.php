@php
 use App\Models\Citas;
@endphp
 <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Listado de citas") }}
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">

                                    @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif

                                    <div class="overflow-x-auto">
                                        <table class="table-fixed w-full border-collapse border border-gray-300">
                                            <thead>
                                                <tr class="bg-gray-100">
                                                    <th class="border border-gray-300 px-4 py-2 w-1/3">{{ __('Cliente') }}</th>
                                                    <th class="border border-gray-300 px-4 py-2 w-1/3">{{ __('Marca') }}</th>
                                                    <th class="border border-gray-300 px-4 py-2 w-1/6">{{ __('Modelo') }}</th>
                                                    <th class="border border-gray-300 px-4 py-2 w-1/6">{{ __('Matricula') }}</th>
                                                    <th class="border border-gray-300 px-4 py-2 w-1/3">{{ __('Fecha') }}</th>
                                                    <th class="border border-gray-300 px-4 py-2 w-1/6">{{ __('Hora') }}</th>
                                                    <th class="border border-gray-300 px-4 py-2 w-1/6">{{ __('Duración') }}</th>
                                                    <th class="border border-gray-300 px-4 py-2 w-1/6 text-center">{{ __('') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- Hello --}}
                                                @php
                                                    if (auth()->user()->role === 'cliente') {
                                                        $listacitas = Citas::where('cliente_id', auth()->user()->id)->get();
                                                    } elseif (auth()->user()->role === 'taller') {
                                                        $listacitas = Citas::all();
                                                    } else {
                                                        $listacitas = collect(); // fallback empty collection
                                                    }
                                                @endphp

                                                @foreach ($listacitas as $cita)
                                                    <tr>
                                                        <td class="border border-gray-300 px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->cliente->name ?? 'N/A' }}</td>
                                                        <td class="border border-gray-300 px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->marca }}</td>
                                                        <td class="border border-gray-300 px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->modelo }}</td>
                                                        <td class="border border-gray-300 px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->matricula }}</td>
                                                        <td class="border border-gray-300 px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->fecha ?? 'Sin determinar' }}</td>
                                                        <td class="border border-gray-300 px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->hora ?? 'Sin determinar' }}</td>
                                                        <td class="border border-gray-300 px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->duracion ?? 'Sin determinar' }}</td>
                                                        @if(auth()->user()->role === 'taller' || 'cliente')
                                                        <td class="border border-gray-300 px-4 py-2 w-1/6 text-center">
                                                            <div class="flex justify-center items-center gap-1">
                                                                <a href="{{ route('citas.show', $cita) }}" class="btn btn-sm btn-outline-primary" title="{{ __('Ver') }}">
                                                                    <i class="bi bi-eye-fill"></i>
                                                                </a>
                                                        @if(auth()->user()->role === 'taller')
                                                                <a href="{{ route('citas.edit', $cita) }}" class="btn btn-sm btn-outline-success" title="{{ __('Editar') }}">
                                                                    <i class="bi bi-pencil-fill"></i>
                                                                </a>

                                                                <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                                            title="{{ __('Eliminar') }}"
                                                                            onclick="return confirm('{{ __('¿Estás seguro?') }}')">
                                                                        <i class="bi bi-trash-fill"></i>
                                                                    </button>
                                                                </form>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>