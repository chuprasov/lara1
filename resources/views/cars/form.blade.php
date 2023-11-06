<div class="mb-3">
    {{-- <x-form-input type="text" name="brand" label="Марка " /> --}}
    <x-form-select label="Марка" name="brand_id" :options="$brands" placeholder="Не выбрано"/>
</div>
{{-- @error('brand')
    <div style="color: red">{{ $message }}</div>
@enderror --}}
<div class="mb-3">
    <x-form-input type="text" name="model" label="Модель " />
</div>
<div class="mb-3">
    <x-form-input type="text" name="vin" label="VIN " />
</div>
<div class="mb-3">
    <x-form-select label="Трансмиссия111:" name="transmission" :options="config('app-cars.transmissions')" placeholder="Не выбрано"/>
</div>
<div class="mb-3">
	<x-form-select name="tags[]" label="Теги" :options="$tags" multiple :size="$tags->count()" many-relation />
</div>
@error('tags.*')
	<div class="alert alert-danger my-2">{{ $message }}</div>
@enderror

<div class="mb-3">
    <x-form-submit id="btn-save">Сохранить</x-form-submit>
</div>

<div class="mb-3">
    <a id="btn-cancel" href="{{route('cars.index')}}" class="btn btn-secondary">Отмена</a>
</div>

