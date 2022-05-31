@extends('layouts.app')

@section('content')

    <div class="card mb-4">
        <div class="card-header">
            Modello
        </div>

        <div class="card-body">
            <ul>
                <li>
                    {{ trans('cruds.modello.fields.name') }}: {{ $modello->name }}
                </li>

                <li>
                    {{ trans('cruds.modello.fields.description') }}: {{ $modello->description }}
                </li>


            </ul>



        </div>




    </div>
@endsection
