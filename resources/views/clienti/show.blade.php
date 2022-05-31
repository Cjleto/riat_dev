@extends('layouts.app')

@section('content')

    <div class="card mb-4">
        <div class="card-header">
            Cliente
        </div>

        <div class="card-body">
            <ul>
                <li>
                    {{ trans('cruds.cliente.fields.name') }}: {{ $cliente->name }}
                </li>

                <li>
                    {{ trans('cruds.cliente.fields.description') }}: {{ $cliente->description }}
                </li>

                <li>
                    {{ trans('cruds.cliente.fields.indirizzo') }}: {{ $cliente->indirizzo }}
                </li>

                <li>
                    {{ trans('cruds.cliente.fields.civico') }}: {{ $cliente->civico }}
                </li>

                <li>
                    {{ trans('cruds.cliente.fields.cap') }}: {{ $cliente->cap }}
                </li>

                <li>
                    {{ trans('cruds.cliente.fields.citta') }}: {{ $cliente->citta }}
                </li>

                <li>
                    {{ trans('cruds.cliente.fields.telefono') }}: {{ $cliente->telefono }}
                </li>

                <li>
                    {{ trans('cruds.cliente.fields.email') }}: {{ $cliente->email }}
                </li>
            </ul>



        </div>




    </div>
@endsection
