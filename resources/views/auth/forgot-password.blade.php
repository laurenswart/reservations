<x-guest-layout>
    <x-auth-card>

        

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        
        <div class="sign-in-form">
            <div class="mb-4 text-sm ">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <!-- Email Address -->
                <div>
                    <label for="email">Email</label>
                    <input id="email" class=" mt-1 block w-100" type="email" name="email" value="{{ old('email') ?? '' }}" required autofocus />
                </div>
                <button type="submit" class="sign-in-form-button"> {{ __('Send Link') }}</button>
                
            </form>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        </div>
    </x-auth-card>
</x-guest-layout>
