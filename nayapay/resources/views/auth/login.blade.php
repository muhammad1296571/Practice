@extends('website.mastar')

@section('main')
    <x-guest-layout>
        <!-- Session Status -->

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="my-10 flex  justify-center">
                <img src="./image/images.png" alt="">
            </div>
            <div>
                <script>
                    var x = document.getElementById("error");

                    setTimeout(() => {

                        x.remove();

                    }, 6000);
                </script>

                <x-input-error :messages="$errors->get('email')" id="error" />
                <x-input-error :messages="$errors->get('password')" />


            </div>
            <!-- Email Address -->
            <div>
                <x-input-label class="my-3" for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label class="my-3" for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />

            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-orange-500  shadow-sm focus:ring-orange-600   " name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>


    </x-guest-layout>
@endsection
