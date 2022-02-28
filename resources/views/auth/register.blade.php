<x-guest-layout>
    <x-auth-card>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="sign-in-form">
                <h4 class="text-center">Register</h4>
                <span class="d-flex justify-content-between">
                    <label for="sign-in-form-firstname">Firstname</label>
                    <input type="text" class="sign-in-form-input" name="firstname">
                </span>
                <span class="d-flex justify-content-between">
                    <label for="sign-in-form-lastname">Lastname</label>
                    <input type="text" class="sign-in-form-input" name="lastname">
                </span>
                <span class="d-flex justify-content-between">
                    <label for="sign-in-form-login">Username</label>
                    <input type="text" class="sign-in-form-input" name="login"  id="sign-in-form-username">
                </span>
                <span class="d-flex justify-content-between">
                    <label for="sign-in-form-email">Email</label>
                    <input type="text" class="sign-in-form-input" name="email" value="{{ old('email') ?? '' }}">
                </span>
                <span class="d-flex justify-content-between">
                    <label for="sign-in-form-password">Password</label>
                    <input type="password" class="sign-in-form-password" name="password" value="{{ old('password') ?? '' }}">
                </span>
                <span class="d-flex justify-content-between">
                    <label for="sign-in-form-password-conf">Confirmation</label>
                    <input type="password" class="sign-in-form-input" id ="sign-in-form-password-conf" name="password_confirmation" value="{{ old('password_confirmation') ?? '' }}">
                </span>
                   
                <button type="submit" class="sign-in-form-button"> {{ __('Register') }}</button>

                <a class="underline text-sm" href="{{ route('login') }}"> {{ __('Already registered?') }}</a>

            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
