<div>
    @props(['name', 'title'])

    <label class="control-label required" for="{{$name}}-input">{{$title}}</label>

    <textarea id="{{$name}}-input" name="{{$name}}" cols="30" rows="5" value="{{old($name)}}" class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}">{{{ old($name) }}}</textarea>

    @if($errors->has($name))
        <div id="error" class="invalid-feedback">{{ ucfirst($errors->first($name)) }}</div>
    @endif
</div>