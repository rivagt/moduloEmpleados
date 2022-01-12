<div class="form-group">
    <label for="name">{{ $title }}</label>
    <textarea class="form-control bg-light shadow-sm @error($variable)
    is-invalid
    @else
    border-0
    @enderror"
        id="{{ $variable }}" name="{{ $variable }}" placeholder="{{ $placeholder }}"
        >{{ old($variable) }}</textarea>
    @error($variable)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    {{-- {!! $errors->first('name', ' <br>') !!} --}}
</div>
