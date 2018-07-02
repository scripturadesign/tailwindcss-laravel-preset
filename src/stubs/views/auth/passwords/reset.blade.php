@extends('layouts.app')

@section('body')
    @component('components.form-card')
        @slot('formAction', route('password.request'))
        @slot('title', __('Reset Password'))
        @slot('formHiddenFields')
            <input type="hidden" name="token" value="{{ $token }}">
        @endslot

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="mb-4">
            <label for="email" class="text-grey-darker block pb-2">
                {{ __('Email') }}
            </label>
            <input
                id="email"
                name="email"
                type="email"
                value="{{ $email ?? old('email') }}"
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
                    {{ __('Reset Password') }}
                </button>
            </div>
        @endslot
    @endcomponent
@endsection
