@extends('layouts.app')

@section('content')

    <div class="card mb-4">
        <div class="card-header">
            Modulo
        </div>

        <div class="card-body">
            <ul>
                <li>
                    {{ trans('cruds.modulo.fields.name') }}: {{ $modulo->name }}
                </li>

                <li>
                    {{ trans('cruds.modulo.fields.description') }}: {{ $modulo->description }}
                </li>


            </ul>



        </div>




    </div>
@endsection
