@props(['label', 'name', 'defaultValue' => ''])

{{ $label }}
<input type="text" name="{{ $name }}" value="{{ $errors->any() ? old($name) : $defaultValue }}">
@error('{{$name}}')
    <div style="color: red">{{ $message }}</div>
@enderror

