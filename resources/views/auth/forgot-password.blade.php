<link rel="stylesheet" href="{{ asset('css/auth.css') }}">



<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div class="section2">
        <h1 class="Logo">LOGO</h1>
        <h2>Reset Password</h2>
        <div class="textForgotPassword">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        <div class="email">
            <!-- <x-input-label for="email" :value="__('Email')" /> -->
            <x-text-input id="email" placeholder="Email" class="" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="">
            <button class="login resetpassword">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
        <div class="section2">
        </div>
</form>