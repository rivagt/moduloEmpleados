<div class="form-group">
    <label for="name">{{ $title }}</label>
    <input type="{{ $type }}" class="form-control bg-light shadow-sm @error($variable)
    is-invalid
    @else
    border-0
    @enderror"
        id="{{ $variable }}" name="{{ $variable }}" placeholder="{{ $placeholder }}"
        value="{{ old($variable) }}">
    @error($variable)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    {{-- {!! $errors->first('name', ' <br>') !!} --}}
</div>
