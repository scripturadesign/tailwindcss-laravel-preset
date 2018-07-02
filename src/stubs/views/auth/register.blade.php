@extends('layouts.app')

@section('body')
    @component('components.form-card')
        @slot('formAction', route('register'))
        @slot('title', __('Register for our Website'))

        <div class="mb-4">
            <label for="name" class="text-grey-darker block pb-2">
                {{ __('Name') }}
            </label>
            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name') }}"
                required
                autofocus
                class="field custom-outline {{ $errors->has('name') ? 'border-red-light' : '' }}"
            >
            @if ($errors->has('name'))
                <span class="text-sm text-red-dark" role="alert">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>
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
            <label for="password_confirmation" class="text-grey-darker block pb-2">
                {{ __('Confirm Password') }}
            </label>
            <input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                required
                class="field custom-outline {{ $errors->has('password_confirmation') ? 'border-red-light' : '' }}"
            >
            @if ($errors->has('password_confirmation'))
                <span class="text-sm text-red-dark" role="alert">
                    {{ $errors->first('password_confirmation') }}
                </span>
            @endif
        </div>

        @slot('actions')
            <div class="flex items-center justify-between">
                <button type="submit" class="btn custom-outline">
                    {{ __('Register') }}
                </button>
            </div>
        @endslot

        @slot('footer')
            <p class="text-grey-dark text-sm">
                {{ __('Already have an account?') }}
                <a href="{{ route('login') }}" class="no-underline text-blue rounded custom-outline">
                    {{ __('Login to your Account') }}
                </a>.
            </p>
        @endslot
    @endcomponent
@endsection
