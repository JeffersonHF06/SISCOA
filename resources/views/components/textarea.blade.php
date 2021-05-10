<div>
    @props(['name', 'title', 'value' => '', 'disabled' => ''])

    <label class="control-label required" for="{{$name}}-input">{{$title}}</label>

    <textarea {{$disabled}} id="{{$name}}-input" name="{{$name}}" cols="30" rows="5" class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}">{{ old($name) ?? $value }}</textarea>

    @if($errors->has($name))
        <div id="error" class="invalid-feedback">{{ ucfirst($errors->first($name)) }}</div>
    @endif
</div>