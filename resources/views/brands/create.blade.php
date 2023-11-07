<x-layout.main title="Create brand">
    <x-form method="post" action="{{ route('brands.store') }}">
        <h1>{{ __('Create') }} {{ __('Brand') }}</h1>
        @include('brands.form')
    </x-form>
</x-layout.main>
