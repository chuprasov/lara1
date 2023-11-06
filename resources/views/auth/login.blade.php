<x-layout.main title="Login">
    <!-- Session Status -->
    <div>{{session('status')}}</div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-form-input type="email" name="email" label="{{ __('Email') }}" :value="old('email')" required autofocus autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-form-input type="password" name="password" label="{{ __('Password') }}" :value="old('password')" required autofocus required autocomplete="current-password" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button class="btn btn-primary" >
                {{ __('Log in') }}
            </button>

        </div>
    </form>
</x-layout.main>
