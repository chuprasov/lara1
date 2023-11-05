<x-layout.main title="Brand # {{ $brand->id }}">
    <x-form method="put" action="{{ route('brands.update', $brand->id) }}">
        <h1>Редактировать брэнд</h1>
        @bind($brand)
            @include('brands.form')
        @endbind
    </x-form>
</x-layout.main>
