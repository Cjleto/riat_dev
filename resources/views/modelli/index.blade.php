@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-12">
            <a href="{{ route('modelli.create') }}" class="btn btn-primary">Crea Modello</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            Modelli
        </div>

        <div class="card-body">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Azioni</th>
                </tr>
                </thead>
                <tbody>
                @foreach($modelli as $modello)
                    <tr>
                        <td>{{ $modello->id }}</td>
                        <td>{{ $modello->name }}</td>
                        <td>{{ $modello->description }}</td>
                        <td>
                           <div class="btn-group gap-1">
                               <div>
                                   <a class="btn btn-sm btn-info" href="{{ route('modelli.show', $modello) }}">Vedi</a>
                               </div>
                               <div>
                                   <a class="btn btn-sm btn-warning" href="{{ route('modelli.edit', $modello) }}">Modifica</a>
                               </div>
                               <div>


                                   <form action="{{ route('modelli.destroy', $modello) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                       <input type="hidden" name="_method" value="DELETE">
                                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                       <input type="submit" class="btn btn-sm btn-danger" value="{{ trans('global.delete') }}">
                                   </form>
                               </div>
                           </div>



                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <div class="card-footer">
            {{ $modelli->links() }}
        </div>
    </div>
@endsection
