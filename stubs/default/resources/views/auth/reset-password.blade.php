<x-layout>
    <div class="row d-flex flex-column align-content-center">
        <div class="col-4">
            <x-form.post class="p-4 bg-white shadow-sm mb-3 rounded" :action="route('password.store')">
                {{-- Password Reset Token --}}
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                {{-- Email Address --}}
                <div>
                    <x-input type="email" name="email" label="Email Address" :value="old('email', $request->email)"
                             error-validate required autofocus/>
                </div>

                {{-- Password --}}
                <div class="mt-4">
                    <x-input type="password" name="password" label="Password" error-validate required/>
                </div>

                {{-- Confirm Password --}}
                <div class="mt-4">
                    <x-input type="password" name="password_confirmation" label="Confirm Password" error-validate
                             required/>
                </div>

                <div class="d-flex justify-content-end mt-4 pt-4 border-top">
                    <x-button.primary type="submit">
                        {{ __('Reset Password') }}
                    </x-button.primary>
                </div>
            </x-form.post>
        </div>
    </div>
</x-layout>
