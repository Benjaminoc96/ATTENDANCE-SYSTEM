<!-- @extends('layouts.main') -->
<!-- Session Status -->
<x-auth-session-status class="body" :status="session('status')" />
<!-- @section('content') -->
<div class="section">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <form method="POST" action="{{ route('login') }}" class="">
        @csrf
        <div class="section2">
            <img src="../../../public/images/logo.png" alt="">

            <h2>LOGIN HERE</h2>
            <!-- Email Address -->
            <div class="email">
                <!-- <x-input-label for="email" :value="__('Email')" /> -->
                <x-text-input id="email" placeholder="Email" class="" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="password">
                <!-- <x-input-label for="password" :value="__('Password')" /> -->

                <x-text-input id="password" placeholder="Password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <button class="login">
                {{ __('Log in') }}
            </button>

            <!-- Remember Me -->
            <div class="RemForget">
                <div class="rememberMe">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="section-forget">
                    @if (Route::has('password.request'))
                    <a class="forgetPswd" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif

                </div>
            </div>
            <p>Sign in with:</p>
            <div class="options">
                <a href=""> Zimbra</a>
                <a href="">Google</a>
            </div>
        </div>
    </form>
</div>
<!-- @endsection -->