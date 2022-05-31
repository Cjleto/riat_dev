@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control">
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.password_helper') }}
                </p>
                <div class="form-check" style="margin-top: -1em;">
                    <label class="form-check-label">
                        <input type="checkbox" name="forza_cambio_password" class="form-check-input" value="">Forza cambio password al prossimo accesso
                    </label>
                </div>
            </div>
            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                <label for="roles">{{ trans('cruds.user.fields.roles') }}*
                    {{--<span class="btn btn-info btn-sm select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-sm deselect-all">{{ trans('global.deselect_all') }}</span>--}}
				</label>
                <select name="roles" id="roles" class="form-control"  required>
                    @foreach($roles as $id => $role)
                        {{--<option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>--}}
						<option value="{{ $role }}" {{ (old('roles') == $role || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <em class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.roles_helper') }}
                </p>
            </div>


			{{--AGENZIE LE MOSTRO SOLO SE SI SELEZIONA IL RUOLO 'AGENZIA'--}}
			<div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}" style="display: none;"  id="container_agenzia">
				<label for="agenzia">{{ trans('cruds.agenzie.title_singular') }}*
					{{--<span class="btn btn-info btn-sm select-all">{{ trans('global.select_all') }}</span>
					<span class="btn btn-info btn-sm deselect-all">{{ trans('global.deselect_all') }}</span>--}}
				</label>

				<select name="agenzia" id="agenzia" class="form-control selectpicker" data-live-search="true">
					<option value="" selected></option>
					@foreach($agenzie as $id => $agenzia)
						<option value="{{ $id }}" {{ (old('agenzia') == $id || isset($user) && $user->agenzia->contains($id)) ? 'selected' : '' }} >{{ $agenzia }}</option>
					@endforeach
				</select>
				@if($errors->has('agenzia'))
					<em class="invalid-feedback">
						{{ $errors->first('agenzia') }}
					</em>
				@endif

			</div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
        <div class="row">
            <div class="col-4">
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>


    </div>
</div>
@endsection

@section('scripts')
	@parent
	<script>

        /*$(document).ready(function () {
            $("#agenzia").select2({
                placeholder: "Seleziona Agenzia di appartenenza",
                allowClear: true
            });
        });*/

        $(document).ready(function () {

            $('#roles').on('change',function(){
                var val = this.value;
                if(val == 'agenzia'){
                    $('#container_agenzia').show(500);
                } else {
                    $('#agenzia').val('').change();
                    $('#container_agenzia').hide(500);
                }
            }).trigger('change')

        });


	</script>
@endsection
