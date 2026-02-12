<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if(session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('otp.verify.submit') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="session('email')" required autofocus autocomplete="email" />
            </div>

            <div class="mt-4">
                <x-label for="otp" value="{{ __('OTP Code') }}" />
                <x-input id="otp" class="block mt-1 w-full" type="text" name="otp" required autofocus autocomplete="one-time-code" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already have an account? Login') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Verify OTP') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
