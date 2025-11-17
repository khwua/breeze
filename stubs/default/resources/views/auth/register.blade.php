<x-layout>
    <div class="row d-flex flex-column align-content-center">
        <div class="col-4">
            <x-form.post class="p-4 bg-white shadow-sm mb-3 rounded" :action="route('register')">
                {{-- User Name --}}
                <div>
                    <x-input type="text" name="name" label="User Name" :value="old('name')" error-validate
                             required/>
                </div>

                {{-- Email Address --}}
                <div class="mt-4">
                    <x-input type="email" name="email" label="Email Address" :value="old('email')" error-validate
                             required/>
                </div>

                {{-- Password --}}
                <div class="mt-4">
                    <x-input type="password" name="password" label="Password" autocomplete="new-password" error-validate
                             required/>
                </div>

                {{-- Confirm Password --}}
                <div class="mt-4">
                    <x-input type="password" name="password_confirmation" label="Confirm Password"
                             autocomplete="new-password" error-validate required/>
                </div>

                <div class="d-flex justify-content-between mt-4 pt-4 border-top">
                    <a class="text-decoration-none" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button.primary type="submit">
                        {{ __('Register') }}
                    </x-button.primary>
                </div>
            </x-form.post>
        </div>
    </div>
</x-layout>
