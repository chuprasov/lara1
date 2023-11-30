<x-layout.main title="Main page">
    <h2>{{ __('Cars') }}</h2>
    <a id="btn-create" href="{{ route('cars.create') }}">{{ __('Create') }}</a>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"> ID </th>
                <th scope="col"> {{ __('Brand') }} </th>
                <th scope="col"> {{ __('Model') }} </th>
                <th scope="col"> {{ __('Transmission') }} </th>
                <th scope="col"> VIN </th>
                <th scope="col"> {{ __('Tags') }} </th>
                <th scope="col"> {{ __('Created') }} </th>
                {{-- <th scope="col"> {{__('Status')}} </th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr class="{{ $car->trashed() ? 'table-danger' : '' }}">
                    <th scope="row"> {{ $car->id }} </th>
                    <td> {{ $car->brand->title }} </td>
                    <td> {{ $car->model }} </td>
                    <td> {{ config('app-cars.transmissions')[$car->transmission] }} </td>
                    <td> {{ $car->vin }} </td>
                    <td>
                        @foreach ($car->tags as $tag)
                            <div class="d-inline p-1 bg-info bg-opacity-25 rounded">{{ $tag->title }}</div>
                        @endforeach
                    </td>
                    <td> {{ $car->created_at->timezone('Europe/Istanbul') }} </td>
                    {{-- <td> {{ $car->status->title() }} </td> --}}
                    <td>
                        @if (!$car->trashed())
                            <a id="show-{{ $car->id }}"
                                href="{{ route('cars.show', [$car->id]) }}">{{ __('Show') }}</a>
                            <a href="{{ route('cars.edit', [$car->id]) }}">{{ __('Edit') }}</a>
                        @else
                            <a href="{{ route('cars.restore', [$car->id]) }}">{{ __('Restore') }}</a>
                        @endif
                        <a href="{{ route('cars.before-destroy', [$car->id]) }}">{{ __('Delete') }}</a>
                    </td>
                    <td>
                        <img src="{{ asset('storage') . '/' . (empty($car->image) ? 'img/car.png' : $car->image) }}"
                            alt="Image not found" class="rounded" alt="Responsive image" width="70">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout.main>
