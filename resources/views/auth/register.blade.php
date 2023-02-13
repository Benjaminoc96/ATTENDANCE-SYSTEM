<!-- @extends('layouts.main') -->
<!-- Session Status -->
<!-- @section('content') -->
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->

    <div class="section2">
        <h1 class="Logo">LOGO HERE</h1>
        <h2>SIGN UP HERE</h2>
        <div class="name email">
            <!-- <x-input-label for="name" :value="__('Name')" /> -->
            <x-text-input id="name" class="block mt-1 w-full" placeholder="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="email">
            <!-- <x-input-label for="email" :value="__('Email')" /> -->
            <x-text-input id="email" type="email" placeholder="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="password">
            <!-- <x-input-label for="password" :value="__('Password')" /> -->

            <x-text-input id="password" type="password" placeholder="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="password">
            <!-- <x-input-label for="password_confirmation" :value="__('Confirm Password')" /> -->

            <x-text-input id="password_confirmation" placeholder="confirm password" class=" password-confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="Submit">
            <a class="" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
    <br>
            <button class="login" type="submit">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>
<!-- @endsection -->