<x-layout>
    <div class="row d-flex flex-column align-content-center">
        <div class="col-6">
            <x-form.post class="p-4 bg-white shadow-sm mb-3 rounded" :action="route('password.email')">
                <div class="mb-4 small text-black-50">
                    {{ __('Forgot your password? Let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')"/>

                <!-- Email Address -->
                <div>
                    <x-input type="email" name="email" label="Email Address" :value="old('email')" error-validate
                             required autofocus/>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <x-button.primary type="submit">
                        {{ __('Email Password Reset Link') }}
                    </x-button.primary>
                </div>
            </x-form.post>
        </div>
    </div>
</x-layout>
