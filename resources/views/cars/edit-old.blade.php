<x-layout.main title="Car # {{ $car->id }}">
    <form method="post" action="{{ route('cars.edit', $car->id) }}">
        @method('PUT')
        @csrf
        <h1>Редактировать автомобиль</h1>
        <br>
        <hr>
        <x-input label="Brand:" name="brand" default-value="{{ $car->brand }}" />
        @error('brand')
            <div style="color: red">{{ $message }}</div>
        @enderror
        <hr><br>
        <x-input label="Model:" name="model" default-value="{{ $car->model }}" />
        @error('model')
            <div style="color: red">{{ $message }}</div>
        @enderror
        <hr><br>
        <x-select label="Трансмиссия:" name="transmission" :options="config('app-cars.transmissions')" :default-value="$car->transmission" />
        <hr><br>

        <input type="submit" name="submit" id="sb" value="Сохранить">
        <hr><br>
    </form>
</x-layout.main>
