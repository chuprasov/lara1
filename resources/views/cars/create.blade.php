<x-layout.main title="Create car">
    <x-form method="post" action="{{ route('cars.store') }}">
        <h1>Новый автомобиль</h1>
        @include('cars.form')
    </x-form>
</x-layout.main>
