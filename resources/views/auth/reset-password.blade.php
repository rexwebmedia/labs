<x-app-layout>
    <x-authentication-card>
        <div class="my-2"></div>
        <x-validation-errors class="mb-5" />
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <x-float.input id="email" name="email" type="text" value="{{ old('email', $request->email) }}" autofocus required label="Email" placeholder="Email" autocomplete="email" class="mb-5" />
            <x-float.input id="password" name="password" type="password" value="" required label="Password" placeholder="Password" autocomplete="new-password" class="mb-4" />
            <x-float.input id="password_confirmation" name="password_confirmation" type="password" value="" required label="Confirm Password" placeholder="Confirm Password" autocomplete="new-password" class="mb-4" />
            <x-button class="w-full">
                {{ __('Reset Password') }}
            </x-button>
        </form>
    </x-authentication-card>
</x-app-layout>
