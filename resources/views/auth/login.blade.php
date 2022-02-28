<x-guest-layout>
    <x-auth-card>
        

        <form method="POST" action="{{ route('login') }}">
        @csrf
            <div class="sign-in-form">
                <h4 class="text-center">Sign In</h4>
                <span class="d-flex justify-content-between">
                    <label for="sign-in-form-username">Username</label>
                    <input type="text" class="sign-in-form-username" name="login" id="sign-in-form-username">
                </span>
                <span class="d-flex justify-content-between">
                    <label for="sign-in-form-password">Password</label>
                    <input type="password" class="sign-in-form-password" name="password" id="sign-in-form-password">
                </span>
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                <button type="submit" class="sign-in-form-button"> {{ __('Log in') }}</button>
                @if (Route::has('password.request'))
                    <a class="underline text-sm" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a><br>
                @endif
                <a class="underline text-sm" href="{{ route('register') }}">{{ __('Not registered ?') }}</a>
            </div>
        </form>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 errors" :errors="$errors" />

    </x-auth-card>
</x-guest-layout>
