<x-layout.main title="Car # {{ $car->id }}">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div>
                    <h2>ID: {{ $car->id }}</h2>
                </div>
                <div>
                    <h2>{{ __('Brand') }}: {{ $car->brand->title }}</h2>
                </div>
                <div>
                    <h2>{{ __('Model') }}: {{ $car->model }}</h2>
                </div>
                <div>
                    <h2>VIN: {{ $car->vin }}</h2>
                </div>
                <div>
                    <h2>{{ __('Transmission') }}: {{ config('app-cars.transmissions')[$car->transmission] }}</h2>
                </div>

                <div>
                    @foreach ($car->tags as $tag)
                        <button class="btn btn-secondary btn-sm">{{ $tag->title }}</button>
                    @endforeach
                </div>

                <div>
                    <h2>{{ __('Created') }}: {{ $car->created_at }}</h2>
                </div>

                <br>
                <a id="btn-home" href="{{ route('cars.index') }}" class="btn btn-primary">{{ __('Home') }}</a>
                <a id="btn-edit" href="{{ route('cars.edit', $car->id) }}"
                    class="btn btn-secondary">{{ __('Edit') }}</a>
                <a id="btn-delete" href="{{ route('cars.before-destroy', $car->id) }}"
                    class="btn btn-danger">{{ __('Delete') }}</a>
                <br><br>
            </div>
            <div class="col-6">
                <img src="{{ asset('storage').'/'.(empty($car->image) ? 'img/car.png' : $car->image) }}" alt="Image not found" class="img-fluid" alt="Responsive image">
                <p>{{ asset('storage') }}/{{ $car->image }}</p>
            </div>
        </div>
    </div>
</x-layout.main>
