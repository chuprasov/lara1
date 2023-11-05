<x-layout.main title="Main page">
    <h2>Brands</h2>
    <a href="{{ route('brands.create') }}">Создать</a>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"> ID </th>
                <th scope="col"> Марка </th>
                <th scope="col"> Создано </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <th scope="row">
                        {{ $brand->id }}
                    </th>
                    <td>
                        {{ $brand->title }}
                    </td>
                    <td>
                        {{ $brand->created_at }}
                    </td>
                    <td>
                        <a href="{{ route('brands.show', [$brand->id]) }}">Show</a>
                        <a href="{{ route('brands.edit', [$brand->id]) }}">Edit</a>
                        <a href="{{ route('brands.before-destroy', [$brand->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout.main>
