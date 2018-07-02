@extends('layouts.app')

@section('body')
    @component('components.form-card')
        @slot('formAction', route('login'))
        @slot('title', __('Login to our Website'))

        <div class="mb-4">
            <label for="email" class="text-grey-darker block pb-2">
                {{ __('Email') }}
            </label>
            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email') }}"
                required
                autofocus
                class="field custom-outline {{ $errors->has('email') ? 'border-red-light' : '' }}"
            >
            @if ($errors->has('email'))
                <span class="text-sm text-red-dark" role="alert">
                    {{ $errors->first('email') }}
                </span>
            @endif
        </div>
        <div class="mb-4">
            <label for="password" class="text-grey-darker block pb-2">
                {{ __('Password') }}
            </label>
            <input
                id="password"
                name="password"
                type="password"
                required
                class="field custom-outline {{ $errors->has('password') ? 'border-red-light' : '' }}"
            >
            @if ($errors->has('password'))
                <span class="text-sm text-red-dark" role="alert">
                    {{ $errors->first('password') }}
                </span>
            @endif
        </div>
        <div class="mb-0">
            <div class="text-grey-darker block">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        @slot('actions')
            <div class="flex items-center justify-between">
                <button type="submit" class="btn custom-outline">
                    {{ __('Login') }}
                </button>
                <a href="{{ route('password.request') }}" class="no-underline inline-block align-baseline text-sm text-blue hover:text-blue-dark float-right rounded custom-outline">
                    {{ __('Forgot Password?') }}
                </a>
            </div>
        @endslot

        @slot('footer')
            <p class="text-grey-dark text-sm">
                {{ __('Don\'t have an account?') }}
                <a href="{{ route('register') }}" class="no-underline text-blue rounded custom-outline">
                    {{ __('Create an Account') }}
                </a>.
            </p>
        @endslot
    @endcomponent
@endsection
