<x-layout>
    <div class="row d-flex flex-column align-content-center">
        <div class="col-6">
            <x-form.post class="p-4 bg-white shadow-sm mb-3 rounded" :action="route('password.confirm')">
                <div class="mb-4 small text-black-50">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </div>

                {{-- Password --}}
                <div>
                    <x-input type="password" name="password" label="Password" autocomplete="current-password"
                             error-validate required/>
                </div>

                <div class="d-flex justify-content-between mt-4 pt-4 border-top">
                    <x-button.primary type="submit">
                        {{ __('Confirm') }}
                    </x-button.primary>
                </div>
            </x-form.post>
        </div>
    </div>
</x-layout>
