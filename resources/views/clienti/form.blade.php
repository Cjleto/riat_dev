
<div class="row">
    <div class="col-12">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">{{ trans('cruds.cliente.fields.name') }}*</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($cliente) ? $cliente->name : '') }}" required>
            @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.cliente.fields.name_helper') }}
            </p>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <label for="description">{{ trans('cruds.cliente.fields.description') }}*</label>
            <input type="text" id="description" name="description" class="form-control" value="{{ old('description', isset($cliente) ? $cliente->description : '') }}" required>
            @if($errors->has('description'))
                <em class="invalid-feedback">
                    {{ $errors->first('description') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.cliente.fields.description_helper') }}
            </p>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-10">
        <div class="form-group {{ $errors->has('indirizzo') ? 'has-error' : '' }}">
            <label for="indirizzo">{{ trans('cruds.cliente.fields.indirizzo') }}*</label>
            <input type="text" id="indirizzo" name="indirizzo" class="form-control" value="{{ old('indirizzo', isset($cliente) ? $cliente->indirizzo : '') }}" required>
            @if($errors->has('indirizzo'))
                <em class="invalid-feedback">
                    {{ $errors->first('indirizzo') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.cliente.fields.indirizzo_helper') }}
            </p>
        </div>
    </div>
    <div class="col-2">
        <div class="form-group {{ $errors->has('civico') ? 'has-error' : '' }}">
            <label for="civico">{{ trans('cruds.cliente.fields.civico') }}*</label>
            <input type="text" id="civico" name="civico" class="form-control" value="{{ old('civico', isset($cliente) ? $cliente->civico : '') }}" required>
            @if($errors->has('civico'))
                <em class="invalid-feedback">
                    {{ $errors->first('civico') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.cliente.fields.civico_helper') }}
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group {{ $errors->has('citta') ? 'has-error' : '' }}">
            <label for="citta">{{ trans('cruds.cliente.fields.citta') }}*</label>
            <input type="text" id="citta" name="citta" class="form-control" value="{{ old('citta', isset($cliente) ? $cliente->citta : '') }}" required>
            @if($errors->has('citta'))
                <em class="invalid-feedback">
                    {{ $errors->first('citta') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.cliente.fields.citta_helper') }}
            </p>
        </div>
    </div>
    <div class="col-2">
        <div class="form-group {{ $errors->has('cap') ? 'has-error' : '' }}">
            <label for="cap">{{ trans('cruds.cliente.fields.cap') }}*</label>
            <input type="text" id="cap" name="cap" class="form-control" value="{{ old('cap', isset($cliente) ? $cliente->cap : '') }}" required>
            @if($errors->has('cap'))
                <em class="invalid-feedback">
                    {{ $errors->first('cap') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.cliente.fields.cap_helper') }}
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-4">
        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : '' }}">
            <label for="telefono">{{ trans('cruds.cliente.fields.telefono') }}*</label>
            <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono', isset($cliente) ? $cliente->telefono : '') }}" required>
            @if($errors->has('telefono'))
                <em class="invalid-feedback">
                    {{ $errors->first('telefono') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.cliente.fields.telefono_helper') }}
            </p>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email">{{ trans('cruds.cliente.fields.email') }}*</label>
            <input type="text" id="email" name="email" class="form-control" value="{{ old('email', isset($cliente) ? $cliente->email : '') }}" required>
            @if($errors->has('email'))
                <em class="invalid-feedback">
                    {{ $errors->first('email') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.cliente.fields.email_helper') }}
            </p>
        </div>
    </div>
</div>


