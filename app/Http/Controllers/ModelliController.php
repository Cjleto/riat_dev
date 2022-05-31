<?php

namespace App\Http\Controllers;

use App\Models\Modello;
use Illuminate\Http\Request;

class ModelliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $modelli = Modello::paginate(10);

        return view('modelli.index', compact('modelli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modello = new Modello();
        return  view('modelli.create', compact('modello'));
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
            "name" => "required|unique:App\Models\Modello,name",
            "description" => "nullable"
        ];

        $validated = $request->validate($rules);

        $modello = Modello::create($validated);

        return  redirect()->route('modelli.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modello  $modello
     * @return \Illuminate\Http\Response
     */
    public function show(Modello $modello)
    {

        return view('modelli.show', compact('modello'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modello  $modello
     * @return \Illuminate\Http\Response
     */
    public function edit(Modello $modello)
    {
        return  view('modelli.edit', compact('modello'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modello  $modello
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modello $modello)
    {
        $rules = [
            "name" => [
                "required",
                'unique:modelli,name,'.$modello->id
            ],
            "description" => "nullable",
        ];

        $validated = $request->validate($rules);

        $modello->update($validated);

        toastSuccess('Modifica Effettuata');

        return redirect()->route('modelli.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modello  $modello
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modello $modello)
    {

        $modello->delete();
        toastSuccess('Modello Eliminato');

        return redirect()->route('modelli.index');

    }
}
