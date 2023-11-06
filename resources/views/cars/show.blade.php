<x-layout.main title="Автомобиль # {{ $car->id }}">
    <div>
        <h2>ID: {{ $car->id }}</h2>
    </div>
    <div>
        <h2>Марка: {{ $car->brand->title }}</h2>
    </div>
    <div>
        <h2>Модель: {{ $car->model }}</h2>
    </div>
    <div>
        <h2>VIN: {{ $car->vin }}</h2>
    </div>
    <div>
        <h2>Трансмиссия: {{ config('app-cars.transmissions')[$car->transmission] }}</h2>
    </div>

    <div>
        @foreach ($car->tags as $tag)
            <button class="btn btn-secondary btn-sm">{{ $tag->title }}</button>
        @endforeach
    </div>

    <div>
        <h2>Создана: {{ $car->created_at }}</h2>
    </div>
    <br>
    <a id="btn-home" href="{{ route('cars.index') }}" class="btn btn-primary">Home</a>
    <a id="btn-edit" href="{{ route('cars.edit', $car->id) }}" class="btn btn-secondary">Edit</a>
    <a id="btn-delete" href="{{ route('cars.before-destroy', $car->id) }}" class="btn btn-danger">Delete</a>
    <br><br>
</x-layout.main>
