<x-layout.main title="Main page">
    <h2>Cars</h2>
    <a href="{{ route('cars.create') }}">Создать</a>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"> ID </th>
                <th scope="col"> Марка </th>
                <th scope="col"> Модель </th>
                <th scope="col"> Трансмиссия </th>
                <th scope="col"> VIN </th>
                <th scope="col"> Тэги </th>
                <th scope="col"> Создано </th>
                <th scope="col"> Статус </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr class="{{ $car->trashed() ? 'table-danger' : '' }}">
                    <th scope="row"> {{ $car->id }} </th>
                    {{-- <td> {{ $car->brand->title ?? '***' }} </td> --}}
                    <td> {{ $car->brand->title }} </td>
                    <td> {{ $car->model }} </td>
                    <td> {{ config('app-cars.transmissions')[$car->transmission] }} </td>
                    <td> {{ $car->vin }} </td>
                    <td>
                        @foreach ($car->tags as $tag)
                            <div class="d-inline p-1 bg-info bg-opacity-25 rounded">{{$tag->title}}</div>
                        @endforeach
                    </td>
                    <td> {{ $car->created_at }} </td>
                    <td> {{ $car->status->title() }} </td>
                    <td>
                        @if (!$car->trashed())
                            <a href="{{ route('cars.show', [$car->id]) }}">Show</a>
                            <a href="{{ route('cars.edit', [$car->id]) }}">Edit</a>
                        @endif
                        <a href="{{ route('cars.before-destroy', [$car->id]) }}">Delete</a>
                        @if (config('app-cars.with-trashed') && $car->trashed())
                            <a href="{{ route('cars.restore', [$car->id]) }}">Restore</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout.main>
