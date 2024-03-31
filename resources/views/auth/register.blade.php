<x-app-layout>
    <x-authentication-card>
        <h1 class="mb-4 text-2xl font-semibold text-center">Create Account</h1>

        <x-validation-errors class="mb-5" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-float.input id="email" name="email" type="text" value="{{ old('email') }}" required autofocus label="Email" placeholder="Email" class="mb-5" />
            <x-float.input id="name" name="name" type="text" value="{{ old('name') }}" required label="Name" placeholder="Name" class="mb-5" />
            <x-float.input id="password" name="password" type="password" required label="Password" placeholder="Password" class="mb-5" />
            <x-float.input id="password_confirmation" name="password_confirmation" type="password" required label="Confirm Password" placeholder="Confirm Password" class="mb-3" />

            <span>Register as:</span>
            <div class="flex gap-5 mb-2">
                <label class="inline-flex gap-2 items-center cursor-pointer">
                    <input type="radio" name="role" checked value="{{ \App\Enums\UserRoleEnum::ADMIN }}" />
                    <span>Clinic</span>
                </label>
                <label class="inline-flex gap-2 items-center cursor-pointer">
                    <input type="radio" name="role" value="{{ \App\Enums\UserRoleEnum::PATIENT }}" />
                    <span>Patient</span>
                </label>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <x-button class="w-full mb-2">{{ __('Register') }}</x-button>
        </form>
        <p>Already have an account. <a href="{{ route('login') }}" class="font-semibold text-primary-500">{{ __('Login') }}</a></p>
    </x-authentication-card>
</x-app-layout>
