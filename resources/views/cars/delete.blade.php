<x-layout.main title="Deleting car # {{ $car->id }}">
    <x-form method="delete" action="{{ route('cars.destroy', $car) }}">
        <p>Удалить автомобиль <strong> {{$car->fullName()}} </strong> ?</p>
        <x-form-submit>Да</x-form-submit>
        <a href="{{route('cars.index')}}" class="btn btn-secondary">Нет</a>
        <hr>
    </x-form>
</x-layout.main>
