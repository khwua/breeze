<x-layout>
    <div class="row d-flex flex-column align-content-center">
        <div class="col-6">
            <div class="p-4 bg-white shadow-sm mb-3 rounded">
                <div class="mb-4 small text-black-50">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 fw-normal small text-success">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="mt-4 d-flex align-items-center justify-content-between">
                    <x-form.post :action="route('verification.send')">
                        <div>
                            <x-button.primary type="submit">
                                {{ __('Resend Verification Email') }}
                            </x-button.primary>
                        </div>
                    </x-form.post>

                    <x-form.post :action="route('logout')">
                        <div>
                            <x-button.primary type="submit">
                                {{ __('Log Out') }}
                            </x-button.primary>
                        </div>
                    </x-form.post>
                </div>
            </div>
        </div>
    </div>
</x-layout>
