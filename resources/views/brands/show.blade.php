<x-layout.main title="Car # {{ $brand->id }}">
    <div>
        <h2>ID: {{ $brand->id }}</h2>
    </div>
    <div>
        <h2>{{ __('Brand') }}: {{ $brand->title }}</h2>
    </div>
    <div>
        <h2>{{ __('Created') }}: {{ $brand->created_at }}</h2>
    </div>
    <br>
    <a id="btn-home" href="{{ route('brands.index') }}" class="btn btn-primary">{{ __('Home') }}</a>
    <a id="btn-edit" href="{{ route('brands.edit', $brand->id) }}" class="btn btn-secondary">{{ __('Edit') }}</a>
    <a id="btn-delete" href="{{ route('brands.before-destroy', $brand->id) }}"
        class="btn btn-danger">{{ __('Delete') }}</a>
    <br><br>
</x-layout.main>
