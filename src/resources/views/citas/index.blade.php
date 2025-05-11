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
                                                        <td class="px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->cliente->name ?? 'N/A' }}</td>
                                                        <td class="px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->marca }}</td>
                                                        <td class="px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->modelo }}</td>
                                                        <td class="px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->matricula }}</td>
                                                        <td class="px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->fecha ?? 'Sin determinar' }}</td>
                                                        <td class="px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->hora ?? 'Sin determinar' }}</td>
                                                        <td class="px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->duracion ?? 'Sin determinar' }}</td>
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