@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Modello
    </div>

    <div class="card-body">
        <form action="{{ route("modelli.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('modelli.form')

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
        <div class="row">
            <div class="col-12 text-end">
                <a style="margin-top:20px;" class="btn btn-outline-info" href="{{ url()->previous() }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>


    </div>
</div>
@endsection
