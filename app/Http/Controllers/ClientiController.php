<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clienti = Cliente::paginate(10);

        return view('clienti.index', compact('clienti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = new Cliente();
        return  view('clienti.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "name" => "required|unique:App\Models\Cliente,name",
            "description" => "nullable",
            "indirizzo" => "required",
            "civico" => "required",
            "cap" => "required",
            "citta" => "required",
            "telefono" => "nullable|numeric",
            "email" => "nullable|email",
        ];

        $validated = $request->validate($rules);

        $cliente = Cliente::create($validated);

        return  redirect()->route('clienti.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {

        return view('clienti.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return  view('clienti.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $rules = [
            "name" => [
                "required",
                'unique:clienti,name,'.$cliente->id
            ],"|unique:App\Models\Cliente,name",
            "description" => "nullable",
            "indirizzo" => "required",
            "civico" => "required",
            "cap" => "required",
            "citta" => "required",
            "telefono" => "nullable|numeric",
            "email" => "nullable|email",
        ];

        $validated = $request->validate($rules);

        $cliente->update($validated);

        toastSuccess('Modifica Effettuata');

        return redirect()->route('clienti.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {

        $cliente->delete();
        toastSuccess('Cliente Eliminato');

        return redirect()->route('clienti.index');

    }
}
