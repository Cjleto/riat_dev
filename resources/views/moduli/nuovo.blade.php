@extends('layouts.app')

@section('content')

    <div class="alert alert-info mb-2">
        Scegli il cliente e il tipo di modulo da generare
        <br>
    </div>
    <div class="alert alert-warning p-1">
        <strong>Attenzione!</strong> se si tratta di un cliente NON inserito nel database, clicca sul tasto "Nuovo Cliente" sulla destra e procedi alla creazione dell'anagrafica
        <a href="{{ route('clienti.create') }}" class="btn btn-sm btn-warning">Nuovo Cliente</a>
    </div>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <div>Nuovo Modulo</div>

        </div>

        <div class="card-body">
            <form action="{{ route('genera_modulo') }}" method="POST">
                @csrf
                <div class="row align-items-end">
                    <div class="col-12 col-lg-5 mb-2 ">
                        @forelse($clienti as $cliente)
                            @if($loop->first)
                                <label for="cliente">Seleziona Cliente</label>
                                <select name="cliente" class="form-select select2">
                                    @endif
                                    <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                                    @if($loop->last)
                                </select>
                            @endif
                        @empty
                            <div class="alert alert-danger">Nessun Cliente rilevato. Creane uno nuovo</div>
                        @endforelse
                    </div>

                    <div class="col-12 col-lg-5 mb-2 ">
                        @forelse($moduli as $modulo)
                            @if($loop->first)
                                <label for="cliente">Seleziona Modulo</label>
                                <select name="modulo" class="form-select select2">
                                    @endif
                                    <option value="{{ $modulo->id }}">{{ $modulo->name }}</option>
                                    @if($loop->last)
                                </select>
                            @endif
                        @empty
                            <div class="alert alert-danger form-control">Nessun Cliente rilevato. Creane uno nuovo</div>
                        @endforelse
                    </div>

                    <div class="col-2 mb-2">
                        @if($moduli->count() > 0 && $clienti->count() > 0)
                            <button type="submit" class="btn btn-sm btn-success text-white">Genera</button>
                        @endif
                    </div>


                </div>
            </form>

        </div>

    </div>
@endsection
