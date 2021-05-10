<div>
    @props(['name', 'title', 'kind' => 'text'])

    <label class="control-label required" for="{{$name}}-input">{{$title}}</label>

    <input type="{{$kind}}" id="{{$name}}-input" name="{{$name}}" value="{{old($name)}}" class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}">

    @if($errors->has($name))
        <div id="error" class="invalid-feedback">{{ ucfirst($errors->first($name)) }}</div>
    @endif
</div>