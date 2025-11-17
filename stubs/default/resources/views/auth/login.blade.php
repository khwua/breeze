<x-layout>
    <div class="row d-flex flex-column align-content-center">
        <div class="col-4">
            {{-- Sessoin Status --}}
            <x-auth-session-status class="mb-4" :status="session('status')"/>

            <x-form.post class="p-4 bg-white shadow-sm mb-3 rounded" :action="route('login')">
                {{-- Email Address --}}
                <div>
                    <x-input type="email" name="email" label="Email Address" :value="old('email')" autocomplete="email"
                             error-validate required/>
                </div>

                {{-- Password --}}
                <div class="mt-4">
                    <x-input type="password" name="password" autocomplete="current-password" label="Password"
                             error-validate required/>
                </div>

                {{-- Remember Me --}}
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="shadow-sm" name="remember">
                        <span class="ms-2 text-secondary user-select-none">
                            {{ __('Remember me') }}
                        </span>
                    </label>
                </div>

                <div class="d-flex justify-content-between mt-4 pt-4 border-top">
                    <a class="text-decoration-none fw-bold" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>

                    <x-button.primary type="submit">
                        {{ __('Login') }}
                    </x-button.primary>
                </div>
            </x-form.post>
        </div>
    </div>
</x-layout>
