<x-layout.main title="Create car">
    <x-form method="post" action="{{ route('cars.store') }}" enctype="multipart/form-data">
        <h1>{{ __('Create') }} {{ __('Car') }}</h1>
        @include('cars.form')
    </x-form>
</x-layout.main>
