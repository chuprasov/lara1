<x-layout.main title="Deleting brand # {{ $brand->id }}">
    <x-form method="delete" action="{{ route('brands.destroy', $brand) }}">
        <p>{{ __('Delete') }} {{ __('Brand') }}<strong> {{$brand->title}} </strong> ?</p>
        <x-form-submit>Да</x-form-submit>
        <a href="{{route('brands.index')}}" class="btn btn-secondary">Нет</a>
        <hr>
    </x-form>
</x-layout.main>
