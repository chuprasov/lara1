<x-layout.main title="Car # {{ $car->id }}">
    <x-form method="put" action="{{ route('cars.update', $car->id) }}">
        <h1>Редактировать автомобиль</h1>
        @bind($car)
            @include('cars.form')
        @endbind
    </x-form>
</x-layout.main>
