<x-layout.main title="Main page">
    <h2>{{ __('Brands') }}</h2>
    <a id="btn-create" href="{{ route('brands.create') }}">{{ __('Create') }}</a>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"> ID </th>
                <th scope="col"> {{ __('Brand') }} </th>
                <th scope="col"> {{ __('Created') }} </th>
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
                        <a href="{{ route('brands.show', [$brand->id]) }}">{{ __('Show') }}</a>
                        <a href="{{ route('brands.edit', [$brand->id]) }}">{{ __('Edit') }}</a>
                        <a href="{{ route('brands.before-destroy', [$brand->id]) }}">{{ __('Delete') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout.main>
