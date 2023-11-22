@extends('layouts.app')

@section('menu')
    @auth
        <li class="nav-item">
            <a class="nav-link" id="cars-index" href="{{ route('cars.index') }}">{{ __('Cars') }} </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="brands-index" href="{{ route('brands.index') }}">{{ __('Brands') }}</a>
        </li>
        @if (!empty(config('verbox.x-token')))
            <li class="nav-item">
                <a class="nav-link" id="messages-index" href="{{ route('messages.index') }}">{{ __('Messages') }}</a>
            </li>
        @endif
    @endauth
@endsection

@section('content')

    <body>
        <div class="site-content">
            <div class="container">
                @if (Session::has('flash_message'))
                    <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                @endif
                {{ $slot }}
            </div>
        </div>
        <footer class="site-footer">
            <div class="container">
                &copy; site about all
            </div>
        </footer>

        @vite(['resources/js/app.js'])
    </body>
@endsection
