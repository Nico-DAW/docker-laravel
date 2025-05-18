<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Citas;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        if (auth()->user()->role === 'cliente') {
            $listacitas = Citas::where('cliente_id', auth()->user()->id)->get();
        } elseif (auth()->user()->role === 'admin') {
            $listacitas = Citas::all();
        } else {
            $listacitas = collect(); // empty collection
        }
    
        return view('citas.index', compact('listacitas'));
        */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'marca' => ['required', 'string', 'max:255'],
            'modelo' => ['required', 'string', 'max:255'],
            'matricula' => ['required', 'string', 'max:255'],
        ]);

        $cita = Citas::create([
            'cliente_id'=>auth()->user()->id,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'matricula' => $request->matricula,
            'fecha'=> $request->fecha,
            'hora'=> $request->hora,
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Citas $cita)
    {
        //
        $cita->update($request->all());

        return redirect()->route('dashboard')
                         ->with('success', 'Cita actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy(string $id)
    public function destroy(Citas $cita)
    {
        //
        $cita->delete();

        return redirect()->route('dashboard')
                         ->with('success', 'Cita eliminada correctamente.');
    }
}
