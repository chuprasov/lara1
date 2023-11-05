@props(['label', 'name', 'options' => [], 'defaultValue' => ''])

<x-form-select name="{{ $name }}" label="{{ $label }}" >
    @foreach ($options as $key => $value)
        {{ $selected = $key == $defaultValue ? 'selected' : '' }}
        <option value="{{ $key }}" {{ $selected }}>{{ $value }}</option>
    @endforeach
</x-form-select>
