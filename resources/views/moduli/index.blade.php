@extends('layouts.app')

@section('content')
    {{--<div class="row mb-2">
        <div class="col-12">
            <a href="{{ route('moduli.create') }}" class="btn btn-primary">Crea Modulo</a>
        </div>
    </div>--}}
    <div class="card mb-4">
        <div class="card-header">
            Moduli
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
                @foreach($moduli as $modulo)
                    <tr>
                        <td>{{ $modulo->id }}</td>
                        <td>{{ $modulo->name }}</td>
                        <td>{{ $modulo->description }}</td>
                        <td>
                           <div class="btn-group gap-1">
                               <div>
                                   <a class="btn btn-sm btn-info" href="{{ route('moduli.show', $modulo) }}">Vedi</a>
                               </div>
                              {{-- <div>
                                   <a class="btn btn-sm btn-warning" href="{{ route('moduli.edit', $modulo) }}">Modifica</a>
                               </div>--}}
                               <div>


                                   <form action="{{ route('moduli.destroy', $modulo) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
            {{ $moduli->links() }}
        </div>
    </div>
@endsection
