<x-layout.main title="Автомобиль # {{ $brand->id }}">
    <div>
        <h2>ID: {{ $brand->id }}</h2>
    </div>
    <div>
        <h2>Марка: {{ $brand->title }}</h2>
    </div>
    <div>
        <h2>Создана: {{ $brand->created_at }}</h2>
    </div>
    <br>
    <a id="btn-home" href="{{ route('brands.index') }}" class="btn btn-primary">Home</a>
    <a id="btn-edit" href="{{ route('brands.edit', $brand->id) }}" class="btn btn-secondary">Edit</a>
    <a id="btn-delete" href="{{ route('brands.before-destroy', $brand->id) }}" class="btn btn-danger">Delete</a>
    <br><br>
</x-layout.main>
