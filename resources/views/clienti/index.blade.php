@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-12">
            <a href="{{ route('clienti.create') }}" class="btn btn-primary">Crea Cliente</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            Clienti
        </div>

        <div class="card-body">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">Azioni</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clienti as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->name }}</td>
                        <td>{{ $cliente->indirizzo }} {{ $cliente->civico }}</td>
                        <td>
                           <div class="btn-group gap-1">
                               <div>
                                   <a class="btn btn-sm btn-info" href="{{ route('clienti.show', $cliente) }}">Vedi</a>
                               </div>
                               <div>
                                   <a class="btn btn-sm btn-warning" href="{{ route('clienti.edit', $cliente) }}">Modifica</a>
                               </div>
                               <div>


                                   <form action="{{ route('clienti.destroy', $cliente) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
            {{ $clienti->links() }}
        </div>
    </div>
@endsection
