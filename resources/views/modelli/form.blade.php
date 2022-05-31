
<div class="row">
    <div class="col-12">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">{{ trans('cruds.modello.fields.name') }}*</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($modello) ? $modello->name : '') }}" required>
            @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.modello.fields.name_helper') }}
            </p>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <label for="description">{{ trans('cruds.modello.fields.description') }}*</label>
            <input type="text" id="description" name="description" class="form-control" value="{{ old('description', isset($modello) ? $modello->description : '') }}" required>
            @if($errors->has('description'))
                <em class="invalid-feedback">
                    {{ $errors->first('description') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.modello.fields.description_helper') }}
            </p>
        </div>
    </div>
</div>



