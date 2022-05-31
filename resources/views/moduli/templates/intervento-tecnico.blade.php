@extends('layouts.app')

@section('content')

    <div class="alert alert-info mb-2 d-flex justify-content-between">
        <div>
            <strong>Modulo: </strong>{{ $modulo->name }}
            <br>
            <strong>Cliente: </strong>{{ $cliente->name }}
        </div>
        <div>
            <a class="btn btn-outline-primary" href="{{ route('nuovo_modulo') }}">Indietro</a>
        </div>

        <div>
            <form action="{{ route('create-pdf-file', ['cliente' => $cliente]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-primary">PDF</button>
            </form>
        </div>

    </div>

    <div class="card mb-4">

        <form action="{{ route('salva_modulo_compilato') }}" method="POST">
            @csrf



            @include('moduli.templates.intervento-tecnico-template', ['cliente' => $cliente])

        </form>

    </div>
@endsection


<style>
    div[class^='col']{
        border: 1px solid black;
    }
    .beni div{
        border-bottom: 1px dotted black;
    }
    .note div{

        border-bottom: 1px dotted black;
    }
</style>
