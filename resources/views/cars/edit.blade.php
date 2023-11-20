<x-layout.main title="Car # {{ $car->id }}">
    <x-form method="put" action="{{ route('cars.update', $car->id) }}" enctype="multipart/form-data">
        <h1>{{ __('Edit') }} {{ __('Car') }}</h1>
        @bind($car)
            @include('cars.form')
        @endbind
    </x-form>
</x-layout.main>
